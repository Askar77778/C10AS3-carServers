<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') Car Server</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    @include('layouts.navbar')

    <main class="flex-grow-1">
        @if(session('success'))
            <div class="container-xxl">
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')

</body>

</html>