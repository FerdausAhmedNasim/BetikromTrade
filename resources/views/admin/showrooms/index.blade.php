@extends('admin.layouts.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">
            <h4>Showrooms List</h4>
            <a href="{{ route('admin.showrooms.create') }}" class="btn btn-primary">
                Add Showroom
            </a>
        </div>

        <div class="card-body">

            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search..."
                        >
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th width="220">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($showrooms as $showroom)
                            <tr>

                                <td>{{ $showroom->id }}</td>

                                <td>{{ $showroom->name }}</td>

                                <td>{{ $showroom->phone ?? '—' }}</td>

                                <td>{{ $showroom->email ?? '—' }}</td>

                                <td>{{ Str::limit($showroom->address, 50) }}</td>

                                <td>
                                    @if($showroom->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.showrooms.show', $showroom) }}"
                                        class="btn btn-info btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('admin.showrooms.edit', $showroom) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.showrooms.destroy', $showroom) }}"
                                        method="POST"
                                        class="d-inline delete-form"
                                    >
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
                                <td colspan="7">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $showrooms->links() }}

        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.delete-form')
        .forEach(form => {
            form.addEventListener('submit', function (e) {
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