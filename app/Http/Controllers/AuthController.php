<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $credential = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            
            $user = Auth::user();  
            return redirect('/admin/dashboard');
            
        }
        return back()->withErrors([
            'email'=> 'data login tidak sesuai'
            ])->onlyInput('email');
    }

     // Fungsi menampilkan halaman Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Fungsi memproses Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', 
        ]);

         return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login menggunakan email Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
