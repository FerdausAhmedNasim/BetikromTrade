@extends('admin.layouts.index')

@section('content')
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="h3 mb-0 text-gray-800 fw-bold">Account Settings</h1>
            <p class="text-muted small">Manage your profile information, password, and security settings.</p>
        </div>
    </div>

    <div class="row shadow-sm rounded-3 bg-white p-4">
        <!-- Left Side Navigation Tabs -->
        <div class="col-lg-3 border-end mb-4 mb-lg-0">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-start py-3 px-4 fw-semibold mb-2" id="profile-info-tab" data-bs-toggle="pill" data-bs-target="#profile-info" type="button" role="tab">
                    <i class="fas fa-user-cog me-2"></i> Profile Information
                </button>
                <button class="nav-link text-start py-3 px-4 fw-semibold mb-2" id="password-update-tab" data-bs-toggle="pill" data-bs-target="#password-update" type="button" role="tab">
                    <i class="fas fa-key me-2"></i> Change Password
                </button>
                <button class="nav-link text-start py-3 px-4 fw-semibold text-danger" id="delete-account-tab" data-bs-toggle="pill" data-bs-target="#delete-account" type="button" role="tab">
                    <i class="fas fa-trash-alt me-2"></i> Delete Account
                </button>
            </div>
        </div>

        <!-- Right Side Content Area -->
        <div class="col-lg-9 ps-lg-4">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Profile Information Form -->
                <div class="tab-pane fade show active" id="profile-info" role="tabpanel">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Password Update Form -->
                <div class="tab-pane fade" id="password-update" role="tabpanel">
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Account Delete Form -->
                <div class="tab-pane fade" id="delete-account" role="tabpanel">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection