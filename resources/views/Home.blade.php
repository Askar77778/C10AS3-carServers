@extends('layouts.app')
@section('title', __('app.pro_car_service') . ' - ' . __('app.home'))

@section('content')

<div class="bg-dark text-white py-5 position-relative hero-section" style="background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.9)), url('{{ asset('images/hero.jpg') }}') center/cover no-repeat;">
    <div class="container-xxl py-md-5 py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-6 text-start">
                <span class="badge bg-warning text-dark text-uppercase px-3 py-2 mb-3 fw-bold tracking-wide">{{ __('app.pro_car_service') }}</span>
                
                <h1 class="display-3 fw-black text-uppercase mb-3 lh-sm text-white">
                    {{ __('app.hero_title') }}
                </h1>
                
                <p class="fs-4 text-light opacity-90 fw-medium mb-4 text-uppercase">
                    {{ __('app.hero_subtitle') }}
                </p>
                
                <div class="d-flex flex-wrap gap-3">
                    @auth
                        <a href="{{ route('client.appointments.index') }}" class="btn btn-warning btn-lg px-4 py-3 text-dark fw-bold text-uppercase shadow-sm">
                            <i class="bi bi-calendar-check me-2"></i>{{ __('app.book_now') }}
                        </a>
                    @else
                        <a href="{{ route('client.login') }}" class="btn btn-warning btn-lg px-4 py-3 text-dark fw-bold text-uppercase shadow-sm">
                            <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('app.book_now') }}
                        </a>
                    @endauth
                    
                    <a href="#hyzmatlarymyz" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold text-uppercase">
                        {{ __('app.our_services') }}
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/home.jpg') }}" 
                     alt="Car Service" 
                     class="img-fluid rounded-4 shadow-lg border border-secondary"
                     style="max-height: 420px; object-fit: cover; width: 100%;">
            </div>

        </div>
    </div>
</div>
<div class="container-xxl mb-5">
    <div id="hyzmatlarymyz" class="row g-4 justify-content-center" style="margin-top: -60px; position: relative; z-index: 10;">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 text-center p-3 service-card transition-all">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <span class="fs-1 text-warning">⚙️</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('app.engine_tuning') }}</h4>
                        <p class="text-muted small">{{ __('app.engine_tuning_desc') }}</p>
                    </div>
                    
                    @auth
                        <a href="{{ route('client.appointments.create', ['service' => __('app.engine_tuning')]) }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @else
                        <a href="{{ route('client.login') }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 text-center p-3 service-card transition-all">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <span class="fs-1 text-warning">💧</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('app.oil_change') }}</h4>
                        <p class="text-muted small">{{ __('app.oil_change_desc') }}</p>
                    </div>
                    
                    @auth
                        <a href="{{ route('client.appointments.create', ['service' => __('app.oil_change')]) }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @else
                        <a href="{{ route('client.login') }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 rounded-4 text-center p-3 service-card transition-all">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <span class="fs-1 text-warning">🔍</span>
                        </div>
                        <h4 class="fw-bold mb-3">{{ __('app.computer_diagnostics') }}</h4>
                        <p class="text-muted small">{{ __('app.computer_diagnostics_desc') }}</p>
                    </div>
                    
                    @auth
                        <a href="{{ route('client.appointments.create', ['service' => __('app.computer_diagnostics')]) }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @else
                        <a href="{{ route('client.login') }}" class="btn btn-dark w-100 rounded-pill py-2 fw-semibold">
                            {{ __('app.continue') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>

    </div>
</div>

<div id="pikirler" class="bg-dark text-white py-5 position-relative overflow-hidden">
    <div class="container text-center py-4">
        <h2 class="fw-bold text-uppercase mb-2">{{ __('app.customer_reviews') }}</h2>
        <p class="text-secondary mb-5">{{ __('app.customer_reviews_subtitle') }}</p>
        
        <div class="row g-4 align-items-center justify-content-center">
            <div class="col-auto d-none d-lg-block">
                <button class="btn btn-outline-light rounded-circle p-3 shadow-sm" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="testimonial-card bg-secondary bg-opacity-10 border border-secondary border-opacity-25 p-4 text-start rounded-4 h-100 d-flex flex-column justify-content-between">
                    <p class="small text-light mb-4 italic">
                        "{{ __('app.review_1') }}"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            AM
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-white fs-6">Atajan M.</h6>
                            <small class="text-info">{{ __('app.customer') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="testimonial-card bg-secondary bg-opacity-10 border border-secondary border-opacity-25 p-4 text-start rounded-4 h-100 d-flex flex-column justify-content-between">
                    <p class="small text-light mb-4 italic">
                        "{{ __('app.review_2') }}"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            KH
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-white fs-6">Kakajan H.</h6>
                            <small class="text-info">{{ __('app.customer') }}</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-lg-3">
                <div class="testimonial-card bg-secondary bg-opacity-10 border border-secondary border-opacity-25 p-4 text-start rounded-4 h-100 d-flex flex-column justify-content-between">
                    <p class="small text-light mb-4 italic">
                        "{{ __('app.review_3') }}"
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar bg-warning text-dark fw-bold rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            BO
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold text-white fs-6">Babajan O.</h6>
                            <small class="text-info">{{ __('app.customer') }}</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-auto d-none d-lg-block">
                <button class="btn btn-outline-light rounded-circle p-3 shadow-sm" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-2 mt-5">
            <span class="bg-warning rounded-pill" style="width: 24px; height: 8px;"></span>
            <span class="bg-secondary rounded-circle" style="width: 8px; height: 8px;"></span>
            <span class="bg-secondary rounded-circle" style="width: 8px; height: 8px;"></span>
        </div>
    </div>
</div>

<style>
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
    }
    .transition-all {
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection