@extends('admin.layouts.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">

            <h4>Cars List</h4>

            <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">
                Add Car
            </a>

        </div>

        <div class="card-body">

            <form method="GET" class="mb-3">

                <div class="row">

                    <div class="col-md-4">

                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search...">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-dark">
                            Search
                        </button>

                    </div>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Image</th>

                            <th>Name</th>

                            <th>Brand</th>

                            <th>Color</th>

                            <th>Price</th>

                            <th width="220">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($cars as $car)
                            <tr>

                                <td>
                                    {{ $car->id }}
                                </td>

                                <td>

                                    <img src="{{ asset('storage/' . $car->image) }}" width="70" class="border">

                                </td>

                                <td>
                                    {{ $car->name }}
                                </td>

                                <td>
                                    {{ $car->brand }}
                                </td>

                                <td>
                                    {{ $car->color }}
                                </td>

                                <td>
                                    {{ $car->price }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.cars.show', $car) }}" class="btn btn-info btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST"
                                        class="d-inline delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7">

                                    No Data Found

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            {{ $cars->links() }}

        </div>

    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.delete-form')
            .forEach(form => {

                form.addEventListener('submit', function(e) {

                    e.preventDefault();

                    Swal.fire({

                        title: 'Are you sure?',

                        text: 'You will not be able to recover this record!',

                        icon: 'warning',

                        showCancelButton: true,

                        confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {

                        if (result.isConfirmed) {

                            form.submit();

                        }

                    });

                });

            });
    </script>
@endsection
