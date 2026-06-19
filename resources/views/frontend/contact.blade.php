@extends('frontend.layouts.master')

@section('title', 'Contact')
@section('description', 'Get in touch with ' . ($setting->site_name ?? 'us'))

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Contact Us</h2>
        <p class="text-muted">We'd love to hear from you. Send us a message below.</p>
    </div>

    <div class="row g-4">

        {{-- Contact Form --}}
        <div class="col-md-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Your name"
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="your@email.com"
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Your phone number"
                            >
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea
                                name="message"
                                rows="5"
                                class="form-control @error('message') is-invalid @enderror"
                                placeholder="Write your message here..."
                            >{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send-fill me-2"></i>Send Message
                        </button>
                    </form>

                </div>
            </div>
        </div>

        {{-- Contact Info --}}
        <div class="col-md-5">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Contact Information</h5>

                    <p class="mb-3">
                        <i class="bi bi-telephone-fill me-2 text-primary"></i>
                        <a href="tel:{{ $setting->phone }}" class="text-decoration-none text-secondary">
                            {{ $setting->phone }}
                        </a>
                    </p>

                    <p class="mb-3">
                        <i class="bi bi-envelope-fill me-2 text-primary"></i>
                        <a href="mailto:{{ $setting->email }}" class="text-decoration-none text-secondary">
                            {{ $setting->email }}
                        </a>
                    </p>

                    <p class="mb-0">
                        <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
                        <span class="text-secondary">{{ $setting->address }}</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection