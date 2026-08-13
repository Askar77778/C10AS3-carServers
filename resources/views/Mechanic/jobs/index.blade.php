@extends('layouts.mechanic.app')
@section('title', 'Assigned Jobs')

@section('content')
<h3 class="mb-3">Assigned Jobs</h3>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Job ID</th>
                    <th>Vehicle Details</th>
                    <th>Description</th>
                    <th>Current Status</th>
                    <th class="text-end">Update Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jobs as $job)
                <tr>
                    <td>#{{ $job->id }}</td>
                    <td>{{ $job->vehicle->make ?? '' }} {{ $job->vehicle->model ?? '' }} ({{ $job->vehicle->license_plate ?? '' }})</td>
                    <td>{{ $job->description }}</td>
                    <td>
                        <span class="badge bg-info text-dark">{{ $job->status }}</span>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('mechanic.jobs.status.update', $job->id) }}" method="POST" class="d-inline-flex gap-2">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm w-auto">
                                <option value="pending" {{ $job->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $job->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $job->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">No assigned jobs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection