@extends('layouts.mechanic.app')
@section('title', __('app.assigned_jobs'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('app.assigned_maintenance_jobs') }}</h3>
</div>

<div class="card mb-3 shadow-sm border-0">
    <div class="card-body">
        <form method="GET" action="{{ route('mechanic.jobs.index') }}" class="row g-2">
            <div class="col-md-9">
                <select name="status" class="form-select form-select-sm">
                    <option value="">{{ __('app.all_job_statuses') }}</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>{{ __('app.pending') }}</option>
                    <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>{{ __('app.in_progress') }}</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('app.completed') }}</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-secondary btn-sm w-100">{{ __('app.filter') }}</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>{{ __('app.job_id') }}</th>
                    <th>{{ __('app.vehicle') }}</th>
                    <th>{{ __('app.task_description') }}</th>
                    <th>{{ __('app.status') }}</th>
                    <th class="text-end">{{ __('app.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                <tr>
                    <td>#{{ $job->id }}</td>
                    <td>{{ $job->vehicle->make ?? __('app.not_available') }}</td>
                    <td>{{ $job->description }}</td>
                    <td>
                        <span class="badge bg-{{ $job->status == 'completed' ? 'success' : ($job->status == 'in_progress' ? 'primary' : 'warning') }}">
                            {{ __('app.' . $job->status) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editJobModal{{ $job->id }}">{{ __('app.update_status') }}</button>
                    </td>
                </tr>

                <!-- EDIT STATUS MODAL -->
                <div class="modal fade" id="editJobModal{{ $job->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('mechanic.jobs.update', $job->id) }}" method="POST" class="modal-content text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.update_job_status') }} #{{ $job->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.job_status') }}</label>
                                    <select name="status" class="form-select">
                                        <option value="pending" {{ $job->status == 'pending' ? 'selected' : '' }}>{{ __('app.pending') }}</option>
                                        <option value="in_progress" {{ $job->status == 'in_progress' ? 'selected' : '' }}>{{ __('app.in_progress') }}</option>
                                        <option value="completed" {{ $job->status == 'completed' ? 'selected' : '' }}>{{ __('app.completed') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('app.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr><td colspan="5" class="text-center py-3 text-muted">{{ __('app.no_jobs_assigned') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection