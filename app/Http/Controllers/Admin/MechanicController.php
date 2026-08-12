<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MechanicController extends Controller
{

    public function index()
    {
        $mechanics = Mechanic::with('user')->get();
        return view('admin.mechanics.index', compact('mechanics'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:users,name',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'required|string|max:100',
            'monthly_schedule' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'mechanic',
            'phone' => $request->phone,
        ]);

        Mechanic::create([
            'user_id' => $user->id,
            'specialization' => $request->specialization,
            'monthly_schedule' => $request->monthly_schedule,
            'is_available' => true,
        ]);

        return redirect()->back()->with('success', 'Täze ussa üstünlikli döredildi!');
    }

    public function destroy($id)
    {
        $mechanic = Mechanic::findOrFail($id);
        $user = User::findOrFail($mechanic->user_id);

        $mechanic->delete();
        $user->delete();

        return redirect()->back()->with('success', 'Ussa ulgamdan öçürildi!');
    }
}