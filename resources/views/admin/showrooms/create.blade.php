@extends('admin.layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Add New Showroom</h4>
    </div>
    <div class="card-body">
        <form
            action="{{ route('admin.showrooms.store') }}"
            method="POST"
        >
            @csrf

            {{-- Name --}}
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    placeholder="Showroom Name"
                >
                @error('name')
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
                    value="{{ old('phone') }}"
                    placeholder="Phone Number"
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
                    value="{{ old('email') }}"
                    placeholder="Email Address"
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
                    id="editor"
                    rows="4"
                    class="form-control @error('address') is-invalid @enderror"
                    placeholder="Full Address"
                >{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Google Map Link --}}
            <div class="mb-3">
                <label class="form-label">Google Map Link</label>
                <input
                    type="text"
                    name="google_map"
                    class="form-control @error('google_map') is-invalid @enderror"
                    value="{{ old('google_map') }}"
                    placeholder="https://maps.google.com/..."
                >
                @error('google_map')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select
                    name="status"
                    class="form-select @error('status') is-invalid @enderror"
                >
                    <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                        Active
                    </option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                        Inactive
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">
                Save Showroom
            </button>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const editor = document.querySelector('#editor');
    if (editor) {
        ClassicEditor
            .create(editor)
            .catch(error => console.error(error));
    }
});
</script>
@endsection