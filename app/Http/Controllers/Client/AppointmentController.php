<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Mechanic;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with(['mechanic.user', 'vehicle'])->where('user_id', auth()->id())->latest()->get();
            
        $vehicles = Vehicle::where('user_id', auth()->id())->get();
        $mechanics = Mechanic::with('user')->where('is_available', true)->get();

        return view('client.appointments.index', compact('appointments', 'vehicles', 'mechanics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'mechanic_id' => 'required|exists:mechanics,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes' => 'nullable|string|max:500',
        ]);

        Appointment::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $request->vehicle_id,
            'mechanic_id' => $request->mechanic_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'notes' => $request->notes,
            'status' => 'Garaşylýar',
        ]);

        return redirect()->back()->with('success', 'Nobata üstünlikli ýazyldyňyz!');
    }


    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $appointment->delete();

        return redirect()->back()->with('success', 'Nobat ýatyryldy!');
    }
}