@extends('admin.layouts.index')

@section('content')

<div class="row">

    <div class="col-md-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6>Total Cars</h6>

                <h1>

                    {{ \App\Models\Car::count() }}

                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow">

            <div class="card-body">

                <h6>Total Value</h6>

                <h1>

                    {{ number_format(
                        \App\Models\Car::sum('price'),
                        2
                    ) }}

                </h1>

            </div>

        </div>

    </div>

</div>

@endsection