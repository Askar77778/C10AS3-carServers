@extends('layouts.admin.app')
@section('title', __('app.mechanics'))

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>{{ __('app.mechanics_management') }}</h3>
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMechanicModal">{{ __('app.add_mechanic') }}</button>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>{{ __('app.name') }}</th>
                    <th>{{ __('app.phone') }}</th>
                    <th class="text-end">{{ __('app.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mechanics as $mechanic)
                <tr>
                    <td>#{{ $mechanic->id }}</td>
                    <td>{{ $mechanic->name }}</td>
                    <td>{{ $mechanic->phone }}</td>
                    <td class="text-end">
                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#showMechanicModal{{ $mechanic->id }}">{{ __('app.show') }}</button>

                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMechanicModal{{ $mechanic->id }}">{{ __('app.edit') }}</button>
  
                        <form action="{{ route('admin.mechanics.destroy', $mechanic->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('{{ __('app.delete') }}?')">{{ __('app.delete') }}</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="showMechanicModal{{ $mechanic->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.mechanic_portal') }} #{{ $mechanic->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-start">
                                <p><strong>{{ __('app.name') }}:</strong> {{ $mechanic->name }}</p>
                                <p><strong>{{ __('app.phone') }}:</strong> {{ $mechanic->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editMechanicModal{{ $mechanic->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('admin.mechanics.update', $mechanic->id) }}" method="POST" class="modal-content text-start">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('app.edit') }} {{ __('app.mechanics') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.name') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $mechanic->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('app.phone') }}</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $mechanic->phone }}" required>
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
                <tr><td colspan="4" class="text-center py-3 text-muted">{{ __('app.no_records') }}</td></tr>
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
                <h5 class="modal-title">{{ __('app.add_mechanic') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">{{ __('app.name') }}</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('app.phone') }}</label>
                    <input type="text" name="phone" class="form-control" required>
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