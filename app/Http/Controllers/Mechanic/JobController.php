<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Ussanyň özüne düşen işleriň sanawy
    public function index()
    {
        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();

        $appointments = Appointment::with(['user', 'vehicle'])->where('mechanic_id', $mechanic->id)->latest()->get();

        return view('mechanic.jobs.index', compact('mechanic', 'appointments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Garaşylýar,Abatlanýar,Taýýar',
        ]);

        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();

        $appointment = Appointment::where('id', $id)->where('mechanic_id', $mechanic->id)->firstOrFail();

        $appointment->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Iş statusy täzelendi');
    }
}