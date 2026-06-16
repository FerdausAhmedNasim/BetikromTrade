@extends('admin.layouts.index')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Car Details</h4>

    </div>

    <div class="card-body">

        <img
            src="{{ asset('storage/'.$car->image) }}"
            width="250"
            class="mb-3 border"
        >

        <table class="table table-bordered">

            <tr>
                <th>Name</th>
                <td>{{ $car->name }}</td>
            </tr>

            <tr>
                <th>Brand</th>
                <td>{{ $car->brand }}</td>
            </tr>

            <tr>
                <th>Color</th>
                <td>{{ $car->color }}</td>
            </tr>

            <tr>
                <th>Size</th>
                <td>{{ $car->size }}</td>
            </tr>

            <tr>
                <th>Price</th>
                <td>{{ $car->price }}</td>
            </tr>

            <tr>
                <th>Details</th>
                <td>{{ $car->details }}</td>
            </tr>

        </table>

    </div>

</div>

@endsection