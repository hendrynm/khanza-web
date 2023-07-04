<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Autentikasi extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        return redirect()->to('/admin/beranda');
//        $credentials = $request->validate([
//            'nomor' => 'required|string',
//            'password' => 'required|string',
//        ]);
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//
//            return redirect('/admin/beranda');
//        } else {
//            return redirect('/')->with('error', 'Invalid credentials.');
//        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}

