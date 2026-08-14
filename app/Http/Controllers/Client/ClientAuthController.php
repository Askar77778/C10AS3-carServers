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
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

 
        $credentials = [
            'name'     => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('client.appointments.index'));
        }

        return back()->withErrors([
            'username' => 'Girizilen ad ýa-da parol ýalňyş.',
        ])->onlyInput('username');
    }


    public function showRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {

        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,name'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        $user = User::create([
            'name'     => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('client.appointments.index');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}