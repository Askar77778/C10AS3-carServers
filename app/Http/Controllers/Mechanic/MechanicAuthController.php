<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MechanicAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.mechanic-login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string', 
            'password' => 'required|string',
        ]);

        $credentials['role'] = 'mechanic'; 

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('mechanic.jobs.index')->with('success', 'Hoş geldiňiz Ussa!');
        }

        return back()->withErrors([
            'name' => 'Ussa hesaby tapylmady ýa-da parol nädogry.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Ulgamdan çykdyňyz.');
    }
}