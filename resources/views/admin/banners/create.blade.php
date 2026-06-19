@extends('admin.layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Add New Banner</h4>
    </div>
    <div class="card-body">
        <form
            action="{{ route('admin.banners.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}"
                    placeholder="Banner Title"
                >
                @error('title')
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

            {{-- Image --}}
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input
                    type="file"
                    name="image"
                    class="form-control @error('image') is-invalid @enderror"
                    accept="image/*"
                >
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <img
                    id="preview"
                    src=""
                    style="display:none; height: 120px; object-fit: contain; margin-top: 10px;"
                >
            </div>

            <button class="btn btn-success">
                Save Banner
            </button>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document
    .querySelector('input[name=image]')
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