@extends('layouts.mechanic.app')
@section('title', 'Work Schedule')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">
                Work Schedule Management
            </div>
            <div class="card-body">
                <form action="{{ route('mechanic.schedule.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Working Hours / Shift Description</label>
                        <input type="text" name="working_hours" class="form-control" value="{{ $schedule->working_hours ?? '' }}" placeholder="e.g. Mon-Fri 09:00 - 18:00" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Status</label>
                        <select name="is_available" class="form-select">
                            <option value="1" {{ ($schedule->is_available ?? true) ? 'selected' : '' }}>Available for Orders</option>
                            <option value="0" {{ !($schedule->is_available ?? true) ? 'selected' : '' }}>Busy / On Leave</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Schedule</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection