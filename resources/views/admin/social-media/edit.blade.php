@extends('admin.layouts.index')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <h4>Social Media</h4>
        </div>
        <div class="card-body">
            <form
                action="{{ route('admin.social-media.update') }}"
                method="POST"
            >
                @csrf
                @method('PUT')

                {{-- Facebook --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-facebook text-primary"></i> Facebook
                    </label>
                    <input
                        type="text"
                        name="facebook"
                        class="form-control @error('facebook') is-invalid @enderror"
                        value="{{ old('facebook', $socialMedia->facebook ?? '') }}"
                        placeholder="https://facebook.com/..."
                    >
                    @error('facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Twitter --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-twitter text-info"></i> Twitter
                    </label>
                    <input
                        type="text"
                        name="twitter"
                        class="form-control @error('twitter') is-invalid @enderror"
                        value="{{ old('twitter', $socialMedia->twitter ?? '') }}"
                        placeholder="https://twitter.com/..."
                    >
                    @error('twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Instagram --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-instagram text-danger"></i> Instagram
                    </label>
                    <input
                        type="text"
                        name="instagram"
                        class="form-control @error('instagram') is-invalid @enderror"
                        value="{{ old('instagram', $socialMedia->instagram ?? '') }}"
                        placeholder="https://instagram.com/..."
                    >
                    @error('instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- WhatsApp --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-whatsapp text-success"></i> WhatsApp
                    </label>
                    <input
                        type="text"
                        name="whatsapp"
                        class="form-control @error('whatsapp') is-invalid @enderror"
                        value="{{ old('whatsapp', $socialMedia->whatsapp ?? '') }}"
                        placeholder="+8801XXXXXXXXX"
                    >
                    @error('whatsapp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- YouTube --}}
                <div class="mb-3">
                    <label class="form-label">
                        <i class="bi bi-youtube text-danger"></i> YouTube
                    </label>
                    <input
                        type="text"
                        name="youtube"
                        class="form-control @error('youtube') is-invalid @enderror"
                        value="{{ old('youtube', $socialMedia->youtube ?? '') }}"
                        placeholder="https://youtube.com/..."
                    >
                    @error('youtube')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    Update Social Media
                </button>

            </form>
        </div>
    </div>

@endsection