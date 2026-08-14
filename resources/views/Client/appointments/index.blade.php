@extends('layouts.client.app')
@section('title', __('app.appointments'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('app.my_appointments') }}</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">+ {{ __('app.new_appointment') }}</button>
</div>

<!-- FILTER SEARCH FORM -->
<div class="card mb-3 shadow-sm border-0">
    <div class="card-body">
        <form method="GET" action="{{ route('client.appointments.index') }}" class="row g-2">
            <div class="col-md-4">
                <select name="status" class="form-select form-select-sm">
                    <option value="">{{ __('app.all_statuses') }}</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('app.pending') }}</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>{{ __('app.confirmed') }}</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>{{ __('app.cancelled') }}</option>
                </select>
            </div>
            <div class="col-md-5">
                <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">{{ __('app.filter') }}</button>
                <a href="{{ route('client.appointments.index') }}" class="btn btn-outline-secondary btn-sm w-100">{{ __('app.reset') }}</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>{{ __('app.vehicle') }}</th>
                    <th>{{ __('app.date') }}</th>
                    <th>{{ __('app.status') }}</th>
                    <th class="text-end">{{ __('app.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr>
                    <td>#{{ $appointment->id }}</td>
                    <td>{{ $appointment->vehicle->make ?? __('app.not_available') }} ({{ $appointment->vehicle->license_plate ?? __('app.not_available') }})</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                        <span class="badge bg-{{ $appointment->status == 'confirmed' ? 'success' : ($appointment->status == 'cancelled' ? 'danger' : 'warning') }}">
                            {{ __('app.' . $appointment->status) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#showAppointmentModal{{ $appointment->id }}">{{ __('app.show') }}</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal{{ $appointment->id }}">{{ __('app.edit') }}</button>
                        <form action="{{ route('client.appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('app.delete_confirm') }}')">{{ __('app.delete') }}</button>
                        </form>
                    </td>
                </tr>

                <!-- SHOW MODAL -->
                <div class="modal fade" id="showAppointmentModal{{ $appointment->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.appointment_details') }} #{{ $appointment->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>{{ __('app.vehicle') }}:</strong> {{ $appointment->vehicle->make ?? __('app.not_available') }} {{ $appointment->vehicle->model ?? '' }}</p>
                                <p><strong>{{ __('app.date') }}:</strong> {{ $appointment->appointment_date }}</p>
                                <p><strong>{{ __('app.status') }}:</strong> {{ __('app.' . $appointment->status) }}</p>
                                <p><strong>{{ __('app.note') }}:</strong> {{ $appointment->note ?? __('app.no_notes') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editAppointmentModal{{ $appointment->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('client.appointments.update', $appointment->id) }}" method="POST" class="modal-content text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.edit_appointment') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.date') }}</label>
                                    <input type="date" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.note') }}</label>
                                    <textarea name="note" class="form-control" rows="2">{{ $appointment->note }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('app.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr><td colspan="5" class="text-center py-3 text-muted">{{ __('app.no_appointments_found') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('client.appointments.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">{{ __('app.book_new_appointment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('app.vehicle') }}</label>
                    <select name="vehicle_id" class="form-select" required>
                        <option value="">{{ __('app.select_vehicle') }}...</option>
                        @foreach($vehicles ?? [] as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->make }} ({{ $vehicle->license_plate }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('app.appointment_date') }}</label>
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('app.note_issue_description') }}</label>
                    <textarea name="note" class="form-control" rows="2"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('app.book_now') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection