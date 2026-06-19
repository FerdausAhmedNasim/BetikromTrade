@extends('frontend.layouts.master')

@section('title', 'Showrooms')
@section('description', 'Visit our showrooms at ' . ($setting->site_name ?? 'Betikrom Trade'))

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Our Showrooms</h2>
        <p class="text-muted">Find a showroom near you and visit us in person</p>
    </div>

    <div class="row g-4">
        @forelse($showrooms as $showroom)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 showroom-card">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-shop me-2 text-primary"></i>
                        {{ $showroom->name }}
                    </h5>

                    <p class="mb-2 text-secondary">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($showroom->address) }}"
                           target="_blank" rel="noopener" class="text-decoration-none text-secondary">
                            {{ $showroom->address }}
                        </a>
                    </p>

                    <p class="mb-0 text-secondary">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:{{ $showroom->phone }}" class="text-decoration-none text-secondary">
                            {{ $showroom->phone }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-5">
            <i class="bi bi-shop display-4 d-block mb-3"></i>
            No showrooms found at the moment.
        </div>
        @endforelse
    </div>

</div>

<style>
    .showroom-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .showroom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1) !important;
    }
</style>
@endsection