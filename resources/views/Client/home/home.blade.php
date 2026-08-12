@extends('layouts.app')
@section('title', 'Car Service - Home')

@section('content')
<div class="bg-dark text-white py-5 mb-5 text-center">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Kärsaz awto bejergi we tehniki hyzmat</h1>
        <p class="lead text-secondary mb-4">Onlaýn kabul edişlige ýazylyň, awtoulagyňyzyň bejergi ýagdaýyna gözegçilik ediň we ýokary hilli hyzmat alyň.</p>
        @auth
            <a href="{{ route('client.appointments.index') }}" class="btn btn-primary btn-lg">Kabul edişlige ýazylmak</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Başlamak</a>
        @endauth
    </div>
</div>

<div class="container mb-5">
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Ýokary hünärli mehanikler</h5>
                    <p class="card-text text-muted">Biziň sertifikatlaşdyrylan toparymyz her bir işi takyklyk, tizlik we ýokary hilde ýerine ýetirýär.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Original ätiýaçlyk şaýlary</h5>
                    <p class="card-text text-muted">Awtoulagyňyzyň uzak möhletli işlemegini üpjün edýän ýokary hilli original ätiýaçlyk şaýlaryny hödürleýäris.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 p-3">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Aňsat onlaýn ýazylyşyk</h5>
                    <p class="card-text text-muted">Awtoulagyňyzy hasaba alyň we birnäçe sekuntyň içinde özüňize amatly wagty saýlaň.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection