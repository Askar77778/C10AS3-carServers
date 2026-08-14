<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="#">Admin Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.mechanics.index') }}">Mechanics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.spare_parts.index') }}">Spare Parts</a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle text-uppercase" href="#" data-bs-toggle="dropdown">
                        {{ app()->getLocale() }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}">TM</a></li>
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