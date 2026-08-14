@extends('layouts.mechanic.app')
@section('title', __('app.work_schedule'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('app.work_schedule') }}</h3>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h5 class="card-title fw-bold">{{ __('app.weekly_shift_overview') }}</h5>
        <p class="text-muted">{{ __('app.weekly_shift_description') }}</p>
        
        <ul class="list-group list-group-flush border-top mt-3">
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                <div>
                    <strong>{{ __('app.monday_friday') }}</strong>
                    <small class="d-block text-muted">{{ __('app.standard_working_hours') }}</small>
                </div>
                <span class="badge bg-primary rounded-pill">09:00 - 18:00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                <div>
                    <strong>{{ __('app.saturday') }}</strong>
                    <small class="d-block text-muted">{{ __('app.half_day_shift') }}</small>
                </div>
                <span class="badge bg-info text-white rounded-pill">09:00 - 14:00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                <div>
                    <strong>{{ __('app.sunday') }}</strong>
                    <small class="d-block text-muted">{{ __('app.off_day') }}</small>
                </div>
                <span class="badge bg-secondary rounded-pill">{{ __('app.closed') }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection