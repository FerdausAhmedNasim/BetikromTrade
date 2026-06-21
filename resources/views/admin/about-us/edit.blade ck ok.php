@extends('admin.layouts.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <h4>About Us</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-us.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $aboutUs->title ?? '') }}" placeholder="About Us Title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Text (CKEditor) --}}
                <div class="mb-3">
                    <label class="form-label">Content</label>
                    <textarea name="text" id="editor" class="form-control @error('text') is-invalid @enderror" rows="10">{{ old('text', $aboutUs->text ?? '') }}</textarea>
                    @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    Update About Us
                </button>

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editor = document.querySelector('#editor');
            if (editor) {
                ClassicEditor
                    .create(editor)
                    .catch(error => console.error(error));
            }
        });
    </script>
@endsection
