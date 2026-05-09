<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout() {
        $cartItems = Cart::where('user_id', Auth::id())
        ->with('product')
        ->get();

        if($cartItems->isEmpty()){
            return redirect()->route('customer.products')
            ->with('error', 'Your cart is empty');
        }
        $total = $cartItems->sum(function($item){
            return $item->product->price * $item->quantity;
        });

        return view ('customer.checkout', compact('cartItems', 'total'));
    }
    
    public function processCheckout(Request $request) {
        $request->validate([
            'shipping_name' => 'required|string|max:225',
            'shipping_address' => 'required|string',
            'shipping_phone' => 'required|string|max:20',
            'payment_method' => 'required|in:bank_transfer,e_wallet,COD', 
        ]);


        $cartItems = Cart::where('user_id', Auth::id())
        ->with('product')
        ->get();

        if($cartItems->isEmpty()){
            return redirect()->route('customer.products')
            ->with('error', 'Your cart is empty');
        }

        $total = $cartItems->sum(function($item){
            return $item->product->price * $item->quantity;
        });
        DB::beginTransaction();
        try{
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-'.time().'-'.Auth::id(),
                'total_amount' => $total,
                'status' => 'pending',
                'shipping_name' => $request->shipping_name,
                'shipping_address' => $request->shipping_address,
                'shipping_phone' => $request->shipping_phone,
                'payment_method' => $request->payment_method,
                'payment_status' => 'unpaid',
            ]);
            foreach($cartItems as $item){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
                $product = $item->product;
                $product->stock -= $item->quantity;
                $product->save();
            }
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('customer.orders.confirmation', $order->id)
                             ->with('success', 'Order placed successfully!');

        } catch(\Exception $e) {
            DB::rollBack();
            // Tampilkan error aslinya agar kita tahu kalau gagal kenapa
            return redirect()->back()->with('error', 'Order Failed: ' . $e->getMessage());
        }
    }

    public function confirmation($orderId){
        $order = Order::where('id', $orderId)
        ->where('user_id', Auth::id())
        ->with('orderItems.product')
        ->firstOrFail();

        return view('customer.order-confirmation', compact('order'));
    }

    public function orders() {
        $order = Order::where('user_id', Auth::id())
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('customer.orders', compact('order'));
    }

    public function orderDetail($orderId) {
        $order = Order::where('id', $orderId)
        ->where('user_id', Auth::id())
        ->with('orderItems.product')
        ->firstOrFail();
        return view('customer.order-detail', compact('order'));
    }

    // Tambahkan ini di bawah method orderDetail
    public function pay($orderId) 
    {
        $order = Order::where('id', $orderId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $order->update([
            'payment_status' => 'paid',
            'status' => 'processing' 
        ]);

        return redirect()->route('customer.order-confirmation', $order->id)
                         ->with('success', 'Pembayaran berhasil dilakukan!');
    }
}
