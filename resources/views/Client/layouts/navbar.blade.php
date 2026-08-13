<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">CarService</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="publicNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" data-bs-toggle="dropdown">
                        {{ app()->getLocale() }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('locale', 'tk') }}">TK</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">EN</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">RU</a></li>
                    </ul>
                </li>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="{{ route('admin.mechanics.index') }}">Admin Panel</a></li>
                    @elseif(auth()->user()->role === 'client')
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="{{ route('client.vehicles.index') }}">My Cabinet</a></li>
                    @elseif(auth()->user()->role === 'mechanic')
                        <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="{{ route('mechanic.jobs.index') }}">Mechanic Portal</a></li>
                    @endif
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>