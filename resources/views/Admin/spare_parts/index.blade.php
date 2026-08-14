@extends('layouts.admin.app')
@section('title', __('app.spare_parts'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('app.spare_parts_management') }}</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPartModal">{{ __('app.add_spare_part') }}</button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>{{ __('app.name') }}</th>
                    <th>{{ __('app.price') }}</th>
                    <th>{{ __('app.stock') }}</th>
                    <th class="text-end">{{ __('app.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($spareParts as $part)
                <tr>
                    <td>#{{ $part->id }}</td>
                    <td>{{ $part->name }}</td>
                    <td>${{ number_format($part->price, 2) }}</td>
                    <td>{{ $part->stock }}</td>
                    <td class="text-end">
                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#showPartModal{{ $part->id }}">{{ __('app.show') }}</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPartModal{{ $part->id }}">{{ __('app.edit') }}</button>
                        <form action="{{ route('admin.spare_parts.destroy', $part->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('app.delete') }}?')">{{ __('app.delete') }}</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="showPartModal{{ $part->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.spare_parts') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>{{ __('app.name') }}:</strong> {{ $part->name }}</p>
                                <p><strong>{{ __('app.price') }}:</strong> ${{ $part->price }}</p>
                                <p><strong>{{ __('app.stock') }}:</strong> {{ $part->stock }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editPartModal{{ $part->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.spare_parts.update', $part->id) }}" method="POST" class="modal-content text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.edit') }} {{ __('app.spare_parts') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $part->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.price') }}</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $part->price }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.stock') }}</label>
                                    <input type="number" name="stock" class="form-control" value="{{ $part->stock }}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.back') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('app.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @empty
                <tr><td colspan="5" class="text-center py-3 text-muted">{{ __('app.no_records') }}</td></tr>
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
                <h5 class="modal-title">{{ __('app.add_spare_part') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('app.name') }}</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('app.price') }}</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('app.stock') }}</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('app.back') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('app.save') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection