@extends('admin.layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Site Settings</h4>
    </div>
    <div class="card-body">
        <form
            action="{{ route('admin.settings.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            {{-- Site Name --}}
            <div class="mb-3">
                <label class="form-label">Site Name</label>
                <input
                    type="text"
                    name="site_name"
                    class="form-control @error('site_name') is-invalid @enderror"
                    value="{{ old('site_name', $setting->site_name ?? '') }}"
                >
                @error('site_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $setting->phone ?? '') }}"
                >
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $setting->email ?? '') }}"
                >
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea
                    name="address"
                    rows="3"
                    class="form-control @error('address') is-invalid @enderror"
                >{{ old('address', $setting->address ?? '') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Logo --}}
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input
                    type="file"
                    name="logo"
                    class="form-control @error('logo') is-invalid @enderror"
                    accept="image/*"
                >
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                {{-- Current Logo Preview --}}
                @if($setting?->logo)
                    <div class="mt-2">
                        <small class="text-muted">Current Logo:</small><br>
                        <img
                            id="preview"
                            src="{{ Storage::url($setting->logo) }}"
                            style="height: 80px; object-fit: contain;"
                        >
                    </div>
                @else
                    <img
                        id="preview"
                        src=""
                        style="display:none; height: 80px; object-fit: contain; margin-top: 8px;"
                    >
                @endif
            </div>

            <button class="btn btn-primary">
                Update Settings
            </button>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document
    .querySelector('input[name=logo]')
    .addEventListener('change', function () {
        let file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function (e) {
                let preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection