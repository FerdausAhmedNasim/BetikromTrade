<div class="card border-0">
    <div class="card-body p-0">
        <div class="mb-4">
            <h5 class="fw-bold text-dark">Profile Information</h5>
            <p class="text-muted small">Update your account's profile information and email address.</p>
        </div>

        <!-- Email Verification Form -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Main Profile Update Form -->
        <form method="post" action="{{ route('profile.update') }}" class="needs-validation">
            @csrf
            @method('patch')

            <div class="row g-3">
                <!-- Name Input -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold text-secondary">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                           value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Input -->
                <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold text-secondary">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                           value="{{ old('email', $user->email) }}" required autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Email Verification Check -->
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="mt-3 p-3 bg-light rounded border">
                            <p class="small text-warning mb-1 fw-semibold">Your email address is unverified.</p>
                            <button form="send-verification" class="btn btn-sm btn-link p-0 text-decoration-none">
                                Click here to re-send the verification email.
                            </button>

                            @if (session('status') === 'verification-link-sent')
                                <p class="small text-success mt-2 mb-0 fw-semibold">
                                    A new verification link has been sent to your email address.
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="col-12 mt-4 d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>

                    @if (session('status') === 'profile-updated')
                        <span class="text-success small fw-semibold" id="saved-toast">
                            <i class="fas fa-check-circle me-1"></i> Saved successfully.
                        </span>
                        <script>
                            setTimeout(() => { document.getElementById('saved-toast').style.display = 'none'; }, 3000);
                        </script>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>