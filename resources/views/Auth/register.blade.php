@extends('layouts.app')
@section('title', __('app.register'))

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4 fw-bold">{{ __('app.register') }}</h4>

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('client.register') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">{{ __('app.username') }}</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.password') }}</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('app.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('app.register') }}</button>
                    </div>

                    <div class="text-center">
                        <small class="text-muted">{{ __('app.already_have_account') }} <a href="{{ route('client.login') }}" class="text-decoration-none">{{ __('app.login') }}</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection