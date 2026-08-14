<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MechanicController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $mechanics = Mechanic::with('user')
            ->when($search, function ($query, $search) {
                $search = trim($search);
                $query->whereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                })->orWhere('specialization', 'like', "%{$search}%");
            })
            ->when($status !== null && $status !== '', function ($query) use ($status) {
                $query->where('is_available', $status === 'available' ? 1 : 0);
            })
            ->latest()
            ->get();

        return view('admin.mechanics.index', compact('mechanics', 'search', 'status'));
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
    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $mechanic = Mechanic::findOrFail($id);
    
    $mechanic->update([
        'name' => $request->name,
    ]);

    return redirect()->back()->with('success', 'Mechanic maglumaty täzelendi!');
    }
}