@extends('layouts.app')

@section('content')
<div class="container-xxl py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">{{ __('app.book_appointment') }}</h4>

                    <form action="{{ route('client.appointments.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('app.selected_service') }}</label>
                            <input type="text" name="service_type" class="form-control" value="{{ old('service_type', $selectedService) }}" required readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('app.select_vehicle') }}</label>
                            <select name="vehicle_id" class="form-select" required>
                                <option value="">--- {{ __('app.select_vehicle') }} ---</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->license_plate }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('app.additional_notes') }}</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="{{ __('app.problem_description_placeholder') }}"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-bold">{{ __('app.confirm_booking') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection