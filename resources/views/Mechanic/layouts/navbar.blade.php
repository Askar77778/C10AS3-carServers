<nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="#">Mechanic Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mechanicNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mechanicNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mechanic.schedule.index') }}">Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mechanic.jobs.index') }}">Assigned Jobs</a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center">
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
                <li class="nav-item">
                    <a class="btn btn-outline-light btn-sm" href="{{ route('home') }}">Site Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>