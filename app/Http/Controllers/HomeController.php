<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function locale($locale)
    {
    if (in_array($locale, ['tm', 'en', 'ru'])) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
    }
}
