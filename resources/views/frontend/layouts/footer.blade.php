@php
    $setting = \App\Models\Setting::first();
    $social = \App\Models\SocialMedia::first();
@endphp

<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row gy-4">

            {{-- Company Info --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-3 text-uppercase">
                    {{ $setting->site_name }}
                </h5>
                <p class="text-secondary mb-0">
                    {{ $setting->address }}
                </p>
            </div>

            {{-- Contact --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-3 text-uppercase">Contact</h5>
                <p class="mb-2">
                    <i class="bi bi-telephone-fill me-2"></i>
                    <a href="tel:{{ $setting->phone }}" class="text-white text-decoration-none">
                        {{ $setting->phone }}
                    </a>
                </p>
                <p class="mb-0">
                    <i class="bi bi-envelope-fill me-2"></i>
                    <a href="mailto:{{ $setting->email }}" class="text-white text-decoration-none">
                        {{ $setting->email }}
                    </a>
                </p>
            </div>

            {{-- Social Media --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-3 text-uppercase">Social Media</h5>
                <div class="d-flex flex-column gap-2">
                    @if($social?->facebook)
                        <a href="{{ $social->facebook }}" target="_blank" rel="noopener"
                            class="text-white text-decoration-none">
                            <i class="bi bi-facebook me-2"></i>Facebook
                        </a>
                    @endif

                    @if($social?->youtube)
                        <a href="{{ $social->youtube }}" target="_blank" rel="noopener"
                            class="text-white text-decoration-none">
                            <i class="bi bi-youtube me-2"></i>YouTube
                        </a>
                    @endif

                    @if($social?->instagram)
                        <a href="{{ $social->instagram }}" target="_blank" rel="noopener"
                            class="text-white text-decoration-none">
                            <i class="bi bi-instagram me-2"></i>Instagram
                        </a>
                    @endif
                </div>
            </div>

        </div>

        <hr class="my-4 border-secondary">

        <div class="text-center text-secondary small" style="color: #6c757d; font-size: 14px; text-align: center;">
            Developed by &copy; {{ date('Y') }}
            <a href="https://web.ferdausahmed.com/" target="_blank"
                style="text-decoration: none; font-weight: bold; color: #ffffff;">
                N<span style="color: #ffd200;">Cloud</span> Solutions
            </a>.
            All Rights Reserved.
        </div>
    </div>
</footer>