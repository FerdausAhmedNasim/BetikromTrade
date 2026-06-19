@extends('frontend.layouts.master')

@section('title', $car->name)
@section('description', $car->name . ' - ' . $car->brand . ' available at ' . ($setting->site_name ?? 'Betikrom Trade'))

@section('content')
    <div class="container py-5">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="zoom-container">
                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                        class="img-fluid rounded shadow">
                </div>
            </div>

            <div class="col-md-6">
                <h1 class="fw-bold">{{ $car->name }}</h1>

                <hr>

                <h4 class="text-primary mb-3">
                    Price: ৳{{ number_format($car->price, 2) }}
                </h4>

                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="bi bi-tag-fill me-2 text-secondary"></i>
                        <strong>Brand:</strong> {{ $car->brand }}
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-palette-fill me-2 text-secondary"></i>
                        <strong>Color:</strong> {{ $car->color }}
                    </li>

                    <li class="mb-2">
                        <i class="bi bi-arrows-fullscreen me-2 text-secondary"></i>
                        <strong>Size:</strong> {{ $car->size }}
                    </li>
                </ul>

                <div class="mb-4">
                    {!! $car->details !!}
                </div>

                <a href="https://wa.me/{{ $setting->whatsapp ?? '8801700000000' }}?text={{ urlencode('I am interested in ' . $car->name) }}"
                    target="_blank" rel="noopener" class="btn btn-success btn-lg">
                    <i class="bi bi-whatsapp me-2"></i>
                    WhatsApp Inquiry
                </a>
            </div>

        </div>
    </div>
@endsection
