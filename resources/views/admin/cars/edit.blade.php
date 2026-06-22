@extends('admin.layouts.index')

@section('content')

    <div class="card shadow">

        <div class="card-header">

            <h4>Edit Car</h4>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.cars.form')

                <button class="btn btn-primary">
                    Update Car
                </button>

            </form>

        </div>

    </div>

@endsection

@section('scripts')

    <script>
        // Multiple gallery image preview
        document.querySelector('input[name="gallery[]"]').addEventListener('change', function () {
            const previewBox = document.getElementById('galleryPreview');
            previewBox.innerHTML = '';

            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.width = 100;
                    img.className = 'border';
                    previewBox.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });

        // Delete existing gallery image via AJAX
        document.querySelectorAll('.delete-gallery-img').forEach(btn => {
            btn.addEventListener('click', function () {
                if (!confirm('Are you sure you want to delete this image?')) return;

                const id = this.dataset.id;
                const url = this.dataset.url;

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                    .then(res => {
                        if (res.ok) {
                            document.getElementById('gallery-img-' + id).remove();
                        } else {
                            alert('Delete failed');
                        }
                    });
            });
        });
    </script>

    <script>

        document
            .querySelector('input[name=image]')
            .addEventListener('change', function () {

                let file = this.files[0];

                if (file) {

                    let reader = new FileReader();

                    reader.onload = function (e) {

                        let preview =
                            document.getElementById('preview');

                        preview.src = e.target.result;

                        preview.style.display = 'block';

                    }

                    reader.readAsDataURL(file);

                }

            });

    </script>

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