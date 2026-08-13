@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-5 col-lg-4">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="card-title text-center mb-4 fw-bold">Create Account</h4>

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <div class="text-center">
                        <small class="text-muted">Already registered? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection