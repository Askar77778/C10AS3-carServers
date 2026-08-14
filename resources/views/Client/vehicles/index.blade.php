@extends('layouts.client.app')
@section('title', 'My Vehicles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>My Vehicles</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addVehicleModal">+ Add Vehicle</button>
</div>

<!-- FILTER SEARCH FORM -->
<div class="card mb-3 border-0 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('client.vehicles.index') }}" class="row g-2">
            <div class="col-md-5">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search make or model..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="type" class="form-select form-select-sm">
                    <option value="">All Types</option>
                    <option value="Sedan" {{ request('type') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="SUV" {{ request('type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Truck" {{ request('type') == 'Truck' ? 'selected' : '' }}>Truck</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">Filter</button>
                <a href="{{ route('client.vehicles.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>License Plate</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicles as $vehicle)
                <tr>
                    <td><span class="badge bg-secondary">{{ $vehicle->license_plate }}</span></td>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->year }}</td>
                    <td class="text-end">
                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#showVehicleModal{{ $vehicle->id }}">Show</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVehicleModal{{ $vehicle->id }}">Edit</button>
                        <form action="{{ route('client.vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete vehicle?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- SHOW MODAL -->
                <div class="modal fade" id="showVehicleModal{{ $vehicle->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title">Vehicle Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>License Plate:</strong> {{ $vehicle->license_plate }}</p>
                                <p><strong>Make:</strong> {{ $vehicle->make }}</p>
                                <p><strong>Model:</strong> {{ $vehicle->model }}</p>
                                <p><strong>Year:</strong> {{ $vehicle->year }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editVehicleModal{{ $vehicle->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('client.vehicles.update', $vehicle->id) }}" method="POST" class="modal-content text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Vehicle</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">License Plate</label>
                                    <input type="text" name="license_plate" class="form-control" value="{{ $vehicle->license_plate }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Make</label>
                                    <input type="text" name="make" class="form-control" value="{{ $vehicle->make }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Model</label>
                                    <input type="text" name="model" class="form-control" value="{{ $vehicle->model }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" value="{{ $vehicle->year }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr><td colspan="5" class="text-center py-3 text-muted">No vehicles found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addVehicleModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('client.vehicles.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">License Plate</label>
                    <input type="text" name="license_plate" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Make</label>
                    <input type="text" name="make" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" name="year" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection