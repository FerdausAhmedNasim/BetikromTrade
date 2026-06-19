@extends('admin.layouts.index')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">
            <h4>Banners List</h4>
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
                Add Banner
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
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th width="220">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>

                                <td>
                                    <img
                                        src="{{ asset('storage/' . $banner->image) }}"
                                        width="70"
                                        class="border"
                                    >
                                </td>

                                <td>{{ $banner->title }}</td>

                                <td>
                                    @if($banner->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.banners.show', $banner) }}" class="btn btn-info btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.banners.destroy', $banner) }}"
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
                                <td colspan="5">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $banners->links() }}

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