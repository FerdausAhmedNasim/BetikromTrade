@extends('admin.layouts.index')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h4>Showroom Details</h4>
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $showroom->name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $showroom->phone ?? '—' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $showroom->email ?? '—' }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{!! $showroom->address !!}</td>
            </tr>
            <tr>
                <th>Google Map</th>
                <td>
                    @if($showroom->google_map)
                        <a href="{{ $showroom->google_map }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-geo-alt"></i> View on Map
                        </a>
                    @else
                        —
                    @endif
                </td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($showroom->status)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $showroom->created_at->format('d M Y, h:i A') }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.showrooms.edit', $showroom) }}" class="btn btn-warning btn-sm">
            Edit
        </a>

        <a href="{{ route('admin.showrooms.index') }}" class="btn btn-secondary btn-sm">
            Back
        </a>

    </div>
</div>
@endsection