@extends('layouts.client.app')
@section('title', 'Appointments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>My Appointments</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">+ New Appointment</button>
</div>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('client.appointments.index') }}" class="row g-2">
            <div class="col-md-4">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">Filter</button>
                <a href="{{ route('client.appointments.index') }}" class="btn btn-outline-secondary btn-sm w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Vehicle</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->vehicle->make ?? '' }} {{ $appointment->vehicle->model ?? '' }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                        <span class="badge bg-{{ $appointment->status === 'cancelled' ? 'danger' : 'success' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="text-end">
                        @if($appointment->status !== 'cancelled')
                        <form action="{{ route('client.appointments.cancel', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Cancel appointment?')">Cancel</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center py-3">No appointments found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addAppointmentModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('client.appointments.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Book Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Vehicle</label>
                    <select name="vehicle_id" class="form-select" required>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->license_plate }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="datetime-local" name="appointment_date" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Book</button>
            </div>
        </form>
    </div>
</div>
@endsection