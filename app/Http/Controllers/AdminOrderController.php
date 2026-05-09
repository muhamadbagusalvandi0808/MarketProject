<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
     public function index()
    {
        $orders=Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }
   
    public function show($id)
    {
        $orders=Order::with(['user', 'orderItems.product'])->findOrFail($id);
        return view('admin.orders.show',compact('orders'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'status'=> 'required|in:pending,processing,complete,cancelled',
            'payment_status'=>'required|in:paid,unpaid',
        ]);


        $order=Order::findOrFail($id);
        $order->update([
            'status'=> $request->status,
            'payment_status'=> $request->payment_status,
        ]);
        // return redirect('admin.orders.show', $id)->with('success','Order Status update successful');
        return redirect()->back()->with('success', 'Berhasil! Data telah diperbarui.');
    }
}
