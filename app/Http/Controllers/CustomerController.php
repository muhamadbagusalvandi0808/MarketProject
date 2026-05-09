<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function products()
    {
        $products = Product::paginate(10);
        return view('customer.products', compact('products'));
        
    }

    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('customer.cart', compact('cartItems', 'total'));
    }
}
