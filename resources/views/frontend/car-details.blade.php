@extends('frontend.layouts.master')

@section('title',$car->name)

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">

            <img
                src="{{ asset('storage/'.$car->image) }}"
                class="img-fluid rounded shadow"
            >

        </div>

        <div class="col-md-6">

            <h1>
                {{ $car->name }}
            </h1>

            <hr>

            <h4>
                Price:
                ৳{{ number_format($car->price,2) }}
            </h4>

            <p>
                <strong>Brand:</strong>
                {{ $car->brand }}
            </p>

            <p>
                <strong>Color:</strong>
                {{ $car->color }}
            </p>

            <p>
                <strong>Size:</strong>
                {{ $car->size }}
            </p>

            <div class="mb-4">

                {!! nl2br(e($car->details)) !!}

            </div>

            <a
                href="https://wa.me/8801700000000?text=I'm interested in {{ urlencode($car->name) }}"
                target="_blank"
                class="btn btn-success"
            >
                WhatsApp Inquiry
            </a>

        </div>

    </div>

</div>

@endsection