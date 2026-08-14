<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-xxl">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">{{ __('app.car_service') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="publicNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">{{ __('app.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#hyzmatlarymyz">{{ __('app.our_services') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#pikirler">{{ __('app.our_members') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <li class="nav-item dropdown me-lg-2">
                    <a class="nav-link dropdown-toggle text-uppercase fw-semibold" href="#" data-bs-toggle="dropdown">
                        {{ app()->getLocale() }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                    <li><a class="dropdown-item" href="{{ route('locale', 'en') }}">{{ __('app.lang_en') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('locale', 'tm') }}">{{ __('app.lang_tk') }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('locale', 'ru') }}">{{ __('app.lang_ru') }}</a></li>
                    </ul>
                </li>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm fw-semibold px-3" href="{{ route('admin.mechanics.index') }}">{{ __('app.admin_panel') }}</a>
                        </li>
                    @elseif(auth()->user()->role === 'client')
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm fw-semibold px-3" href="{{ route('client.vehicles.index') }}">{{ __('app.my_cabinet') }}</a>
                        </li>
                    @elseif(auth()->user()->role === 'mechanic')
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm fw-semibold px-3" href="{{ route('mechanic.jobs.index') }}">{{ __('app.mechanic_portal') }}</a>
                        </li>
                    @endif
                    <li class="nav-item d-flex align-items-center gap-2 ms-lg-2">
                        <span class="badge bg-light text-primary fw-bold px-3 py-2 rounded-pill">
                            {{ auth()->user()->name }}
                        </span>
                        
                        <form action="{{ route('client.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 shadow-sm" title="{{ __('app.logout') }}">
                                {{ __('app.logout') }}
                            </button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('client.login') }}">{{ __('app.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light btn-sm fw-bold px-3 ms-lg-2 text-primary" href="{{ route('client.register') }}">{{ __('app.register') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>