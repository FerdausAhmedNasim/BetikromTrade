<div class="card border-0">
    <div class="card-body p-0">
        <div class="mb-4">
            <h5 class="fw-bold text-dark">Update Password</h5>
            <p class="text-muted small">Ensure your account is using a long, random password to stay secure.</p>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="needs-validation">
            @csrf
            @method('put')

            <div class="row g-3">
                <div class="col-md-12">
                    <label for="update_password_current_password" class="form-label fw-semibold text-secondary">Current Password</label>
                    <input type="password" id="update_password_current_password" name="current_password" 
                           class="form-control form-control-lg @error('current_password', 'updatePassword') is-invalid @enderror" 
                           autocomplete="current-password" required>
                    @error('current_password', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="update_password_password" class="form-label fw-semibold text-secondary">New Password</label>
                    <input type="password" id="update_password_password" name="password" 
                           class="form-control form-control-lg @error('password', 'updatePassword') is-invalid @enderror" 
                           autocomplete="new-password" required>
                    @error('password', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="update_password_password_confirmation" class="form-label fw-semibold text-secondary">Confirm Password</label>
                    <input type="password" id="update_password_password_confirmation" name="password_confirmation" 
                           class="form-control form-control-lg @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                           autocomplete="new-password" required>
                    @error('password_confirmation', 'updatePassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 mt-4 d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                        <i class="fas fa-key me-2"></i> Update Password
                    </button>

                    @if (session('status') === 'password-updated')
                        <span class="text-success small fw-semibold" id="password-saved-toast">
                            <i class="fas fa-check-circle me-1"></i> Password updated successfully.
                        </span>
                        <script>
                            setTimeout(() => { document.getElementById('password-saved-toast').style.display = 'none'; }, 3000);
                        </script>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

