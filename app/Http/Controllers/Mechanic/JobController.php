<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();
        $status = $request->input('status');
        $search = trim((string) $request->input('search', ''));

        $jobs = Appointment::with(['user', 'vehicle'])
            ->where('mechanic_id', $mechanic->id)
            ->when($status !== null && $status !== '', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('vehicle', function ($vehicleQuery) use ($search) {
                        $vehicleQuery->where('brand', 'like', "%{$search}%")
                            ->orWhere('model', 'like', "%{$search}%")
                            ->orWhere('license_plate', 'like', "%{$search}%");
                    })->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%");
                    });
                });
            })
            ->latest()
            ->get();

        $appointments = $jobs;

        return view('mechanic.jobs.index', compact('mechanic', 'jobs', 'appointments', 'status', 'search'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();

        $appointment = Appointment::where('id', $id)
            ->where('mechanic_id', $mechanic->id)
            ->firstOrFail();

        $appointment->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Iş statusy täzelendi');
    }
}