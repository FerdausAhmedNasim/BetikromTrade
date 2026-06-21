@extends('admin.layouts.index')

@section('title', 'About Us')

@section('content')
<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">About Us</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.about-us.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $aboutUs->title ?? '') }}"
                        placeholder="Enter title">

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="editor" class="form-label">Content</label>

                    <textarea
                        id="editor"
                        name="text"
                        rows="12"
                        class="form-control @error('text') is-invalid @enderror">{{ old('text', $aboutUs->text ?? '') }}</textarea>

                    @error('text')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Update About Us
                </button>
            </form>
        </div>
    </div>

</div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editorEl = document.querySelector('#editor');
            if (editorEl && typeof ClassicEditor !== 'undefined') {
                ClassicEditor
                    .create(editorEl)
                    .catch(error => console.error(error));
            }
        });
    </script>
@endsection
