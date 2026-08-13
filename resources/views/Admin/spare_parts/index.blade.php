@extends('layouts.admin.app')
@section('title', 'Spare Parts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Spare Parts Management</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPartModal">+ Add Spare Part</button>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($spareParts as $part)
                <tr>
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->name }}</td>
                    <td>${{ $part->price }}</td>
                    <td>{{ $part->stock }}</td>
                    <td class="text-end">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPartModal{{ $part->id }}">Edit</button>
                        <form action="{{ route('admin.spare_parts.destroy', $part->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete part?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editPartModal{{ $part->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.spare_parts.update', $part->id) }}" method="POST" class="modal-content">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Spare Part</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $part->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $part->price }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stock</label>
                                    <input type="number" name="stock" class="form-control" value="{{ $part->stock }}" required>
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
                <tr><td colspan="5" class="text-center py-3">No spare parts found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addPartModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.spare_parts.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Spare Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
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