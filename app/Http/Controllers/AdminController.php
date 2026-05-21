<?php

namespace App\Http\Controllers;
use App\Models\Product;


class AdminController extends Controller
{

    /**
     * Menampilkan Dashboard Admin dengan summary data produk.
     */
    public function dashboard()
    {
        // Mengambil total jumlah produk untuk ditampilkan di dashboard
        $productCount = Product::count();

        // Mengirimkan data ke view dashboard admin
        return view('admin.dashboard', compact('productCount'));
    }
}
