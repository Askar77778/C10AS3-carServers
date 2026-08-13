@extends('layouts.admin.app')
@section('title', 'Mechanics')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Mechanics Management</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMechanicModal">+ Add Mechanic</button>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mechanics as $mechanic)
                <tr>
                    <td>{{ $mechanic->id }}</td>
                    <td>{{ $mechanic->name }}</td>
                    <td>{{ $mechanic->phone }}</td>
                    <td class="text-end">
                        <form action="{{ route('admin.mechanics.destroy', $mechanic->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete mechanic?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="text-center py-3">No mechanics found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addMechanicModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.mechanics.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Mechanic</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
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