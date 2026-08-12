<?php

namespace App\Http\Controllers\Mechanic;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();
        return view('mechanic.schedule.index', compact('mechanic'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'monthly_schedule' => 'required|string|max:255',
            'specialization' => 'required|string|max:100',
        ]);

        $mechanic = Mechanic::where('user_id', auth()->id())->firstOrFail();

        $mechanic->update([
            'is_available' => $request->has('is_available'),
            'monthly_schedule' => $request->monthly_schedule,
            'specialization' => $request->specialization,
        ]);

        return redirect()->back()->with('success', 'Iş meýilnamasy we maglumatlar täzelendi');
    }
}