<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Ambil cart berdasarkan user yang login
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();

        // Hitung total harga
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Kirim ke view
        return view('customer.cart', compact('cartItems', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $productId)
        ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $productId,
                'quantity'   => $request->input('quantity', 1),
            ]);
        }

    return redirect()->back()->with('success','Product added to cart');
    }

    public function update(Request $request, $CartId)
    {
        $CartItem = Cart::where('id', $CartId)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        $CartItem ->quantity = $request->input('quantity',1);
        $CartItem->save();
        return redirect()->back()->with('success','Cart Updated');
    }

    public function remove($CartId)
    {
        $CartItem = Cart::where('id', $CartId)
        ->where('user_id', Auth::id())
        ->delete();
        return redirect()->back()->with('success','Item Removed Form Cart');
    }
}
