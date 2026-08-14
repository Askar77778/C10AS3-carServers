<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Mechanic;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->input('status');
        $mechanicId = $request->input('mechanic_id');
        $search = trim((string) $request->input('search', ''));

        $appointments = Appointment::with(['mechanic.user', 'vehicle'])
            ->where('user_id', auth()->id())
            ->when($status !== null && $status !== '', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($mechanicId !== null && $mechanicId !== '', function ($query) use ($mechanicId) {
                $query->where('mechanic_id', $mechanicId);
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->whereHas('vehicle', function ($vehicleQuery) use ($search) {
                    $vehicleQuery->where('brand', 'like', "%{$search}%")
                        ->orWhere('model', 'like', "%{$search}%")
                        ->orWhere('license_plate', 'like', "%{$search}%");
                })->orWhereHas('mechanic.user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        $vehicles = Vehicle::where('user_id', auth()->id())->get();
        $mechanics = Mechanic::with('user')->where('is_available', true)->get();

        return view('client.appointments.index', compact('appointments', 'vehicles', 'mechanics', 'status', 'mechanicId', 'search'));
    }
    

    public function create(Request $request)
    {

        $selectedService = $request->query('service', '');
        $vehicles = Vehicle::all();
        return view('client.appointments.create', compact('selectedService', 'vehicles'));
    }

    public function store(Request $request)
{
    $request->validate([
        'vehicle_id'   => 'required|exists:vehicles,id',
        'service_type' => 'required|string',
        'description'  => 'nullable|string',
    ]);

    auth()->user()->appointments()->create([
        'vehicle_id'       => $request->vehicle_id,
        'description'      => $request->service_type . ($request->description ? ' - ' . $request->description : ''),
        'appointment_date' => now()->format('Y-m-d'), 
        'appointment_time' => now()->format('H:i:s'), 
        'status'           => 'pending',
    ]);

    return redirect()->route('client.appointments.index')->with('success', 'Sargyt üstünlikli döredildi!');
}
    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $appointment->delete();

        return redirect()->back()->with('success', 'Nobat ýatyryldy!');
    }
}