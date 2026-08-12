<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    
    public function index()
    {
        $vehicles = Vehicle::where('user_id', auth()->id())->latest()->get();
        return view('client.vehicles.index', compact('vehicles'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'year' => 'required|integer|min:1990|max:2026',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
        ]);

        Vehicle::create([
            'user_id' => auth()->id(),
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'license_plate' => $request->license_plate,
        ]);

        return redirect()->back()->with('success', 'Awtoulag üstünlikli goşuldy!');
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'year' => 'required|integer|min:1990|max:2026',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate,' . $vehicle->id,
        ]);

        $vehicle->update($request->only(['brand', 'model', 'year', 'license_plate']));

        return redirect()->back()->with('success', 'Awtoulag maglumaty täzelendi!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $vehicle->delete();

        return redirect()->back()->with('success', 'Awtoulag öçürildi!');
    }
}