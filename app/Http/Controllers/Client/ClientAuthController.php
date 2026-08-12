<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.client-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials['role'] = 'client';

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('client.vehicles.index')->with('success', 'Hoş geldiňiz!');
        }

        return back()->withErrors([
            'phone' => 'Müşderi hesaby tapylmady ýa-da maglumatlar nädogry.',
        ])->onlyInput('phone');
    }

    public function showRegister()
    {
        return view('auth.client-register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        Auth::login($user);

        return redirect()->route('client.vehicles.index')->with('success', 'Hesabyňyz döredildi!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Ulgamdan çykdyňyz.');
    }
}