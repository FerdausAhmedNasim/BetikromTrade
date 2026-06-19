@extends('admin.layouts.index')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 mb-4">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-md-12 mb-4">
            @include('profile.partials.update-password-form')
        </div>

        <div class="col-md-12">
            @include('profile.partials.delete-user-form')
        </div>

    </div>

</div>

@endsection