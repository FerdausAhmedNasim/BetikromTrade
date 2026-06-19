@extends('admin.layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Banner Details</h4>
    </div>
    <div class="card-body">

        <img
            src="{{ asset('storage/' . $banner->image) }}"
            width="250"
            class="mb-3 border"
        >

        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td>{{ $banner->title }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($banner->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $banner->created_at->format('d M Y, h:i A') }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary btn-sm">
            Back
        </a>

    </div>
</div>
@endsection