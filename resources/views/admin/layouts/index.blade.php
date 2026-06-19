<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Betikrom Trade Admin')
    </title>

    <meta name="description" content="@yield('description', 'Betikrom Trade Admin Panel')">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
            background: #212529;
            width: 260px;
            transition: 0.3s;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }

        .sidebar a:hover {
            background: #343a40;
        }

        .content {
            flex-grow: 1;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="d-flex">

        @include('admin.layouts.sidebar')

        <div class="content">

            @include('admin.layouts.navbar')

            <div class="container-fluid py-4">

                @yield('content')

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editorElement = document.querySelector('#editor');

            if (editorElement) {
                ClassicEditor
                    .create(editorElement, {
                        ckfinder: {
                            uploadUrl: @json(route('admin.upload.image', ['_token' => csrf_token()]))
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @yield('scripts')

</body>

@include('admin.layouts.footer')

</html>
