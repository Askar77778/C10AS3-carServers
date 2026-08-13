<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function locale(string $locale)
    {
        if (in_array($locale, ['tm', 'ru', 'en'])) {
            session(['locale' => $locale]);
        }

        return redirect()->back();
    }
}
