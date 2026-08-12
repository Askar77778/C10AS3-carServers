<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Car Server</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-light">
    <div class="mx-auto vh-100 d-flex align-items-center">
        <form action="{{ route('admin.login') }}" method="post" class="col-2 mx-auto">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
            <div>
                <button class="btn btn-success w-100">
                    Login <i class="bi bi-arrow-left"></i>
                </button>
            </div>
        </form>
    </div>
</body>

</html>