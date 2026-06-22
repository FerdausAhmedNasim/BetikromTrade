@extends('frontend.layouts.master')

@section('title', $car->name)
@section('description', $car->name . ' - ' . $car->brand . ' available at ' . ($setting->site_name ?? 'Betikrom Trade'))

@push('styles')
<style>
    /* ===== Gallery Layout ===== */
    .gallery-wrap {
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }

    /* ===== Thumbnail Column (left side) ===== */
    .thumb-col {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex-shrink: 0;
    }

    .thumb-item {
        width: 64px;
        height: 64px;
        border-radius: 6px;
        overflow: hidden;
        border: 2px solid transparent;
        cursor: pointer;
        opacity: 0.65;
        transition: border-color 0.2s ease, opacity 0.2s ease;
    }

    .thumb-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .thumb-item:hover {
        opacity: 1;
    }

    .thumb-item.active {
        border-color: #0d6efd;
        opacity: 1;
    }

    /* ===== Main Image Wrapper ===== */
    #mainImgWrap {
        position: relative;
        width: 380px;
        height: 380px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        overflow: hidden;
        cursor: crosshair;
        flex-shrink: 0;
        background: #fff;
    }

    #mainImg {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        pointer-events: none;
        user-select: none;
    }

    /* ===== Zoom Lens (on main image) ===== */
    #zoomLens {
        display: none;
        position: absolute;
        width: 120px;
        height: 120px;
        border: 2px solid rgba(255, 255, 255, 0.9);
        background: rgba(0, 100, 255, 0.08);
        pointer-events: none;
        box-sizing: border-box;
        z-index: 5;
    }

    /* ===== Zoom Result Box (right side of main image) ===== */
    #zoomBox {
        display: none;
        width: 380px;
        height: 380px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-repeat: no-repeat;
        flex-shrink: 0;
        background-color: #fff;
    }

    /* ===== Mobile ===== */
    @media (max-width: 991px) {
        #zoomBox {
            display: none !important;
        }

        #zoomLens {
            display: none !important;
        }

        #mainImgWrap {
            cursor: default;
        }
    }

    @media (max-width: 768px) {
        .gallery-wrap {
            flex-direction: column;
        }

        #mainImgWrap {
            width: 100%;
            height: 300px;
        }

        .thumb-col {
            flex-direction: row;
            flex-wrap: wrap;
        }
    }
</style>
@endpush

@section('content')
    <div class="container py-5">
        <div class="row g-5">

            {{-- ===== Left: Image Gallery ===== --}}
            <div class="col-lg-6">
                <div class="gallery-wrap">

                    {{-- থাম্বনেইল কলাম --}}
                    <div class="thumb-col">
                        {{-- প্রথম ইমেজ (মেইন) --}}
                        <div class="thumb-item active"
                             data-src="{{ asset('storage/' . $car->image) }}">
                            <img src="{{ asset('storage/' . $car->image) }}"
                                 alt="{{ $car->name }}">
                        </div>

                        {{-- এক্সট্রা ইমেজগুলো --}}
                        @foreach ($car->images as $img)
                            <div class="thumb-item"
                                 data-src="{{ asset('storage/' . $img->image) }}">
                                <img src="{{ asset('storage/' . $img->image) }}"
                                     alt="{{ $car->name }}">
                            </div>
                        @endforeach
                    </div>

                    {{-- মেইন ইমেজ --}}
                    <div id="mainImgWrap">
                        <img id="mainImg"
                             src="{{ asset('storage/' . $car->image) }}"
                             alt="{{ $car->name }}">
                        <div id="zoomLens"></div>
                    </div>

                    {{-- জুম রিজাল্ট বক্স (মেইন ইমেজের পাশে) --}}
                    <div id="zoomBox"></div>

                </div>
            </div>

            {{-- ===== Right: Car Details ===== --}}
            <div class="col-lg-6">
                <h1 class="fw-bold fs-3">{{ $car->name }}</h1>

                <hr>

                <h4 class="text-primary mb-4">
                    মূল্য: ৳{{ number_format($car->price, 2) }}
                </h4>

                <ul class="list-unstyled mb-4">
                    <li class="mb-3">
                        <i class="bi bi-tag-fill me-2 text-secondary"></i>
                        <strong>ব্র্যান্ড:</strong> {{ $car->brand }}
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-palette-fill me-2 text-secondary"></i>
                        <strong>রঙ:</strong> {{ $car->color }}
                    </li>
                    <li class="mb-3">
                        <i class="bi bi-arrows-fullscreen me-2 text-secondary"></i>
                        <strong>সাইজ:</strong> {{ $car->size }}
                    </li>
                </ul>

                <div class="mb-4">
                    {!! $car->details !!}
                </div>

                <a href="https://wa.me/{{ $setting->whatsapp ?? '8801700000000' }}?text={{ urlencode('I am interested in ' . $car->name) }}"
                   target="_blank"
                   rel="noopener"
                   class="btn btn-success btn-lg">
                    <i class="bi bi-whatsapp me-2"></i>
                    WhatsApp Inquiry
                </a>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const mainImg  = document.getElementById('mainImg');
    const mainWrap = document.getElementById('mainImgWrap');
    const lens     = document.getElementById('zoomLens');
    const zoomBox  = document.getElementById('zoomBox');
    const thumbs   = document.querySelectorAll('.thumb-item');

    if (!mainImg || !mainWrap || !lens || !zoomBox) return;

    const LENS_W  = 120;   // lens এর width (px)
    const LENS_H  = 120;   // lens এর height (px)
    const ZOOM    = 2.5;   // zoom factor

    /**
     * ইমেজ লোড হওয়ার পর background-size সেট করা হয়।
     * naturalWidth/Height = 0 হলে সেটআপ করা হবে না।
     */
    function setupZoom() {
        const nw = mainImg.naturalWidth;
        const nh = mainImg.naturalHeight;
        if (!nw || !nh) return;

        zoomBox.style.backgroundImage = `url('${mainImg.src}')`;
        zoomBox.style.backgroundSize  = `${nw * ZOOM}px ${nh * ZOOM}px`;
    }

    /**
     * Mouse position অনুযায়ী lens ও zoom result আপডেট।
     */
    function moveLens(e) {
        const rect = mainWrap.getBoundingClientRect();

        let x = e.clientX - rect.left - LENS_W / 2;
        let y = e.clientY - rect.top  - LENS_H / 2;

        // boundary check
        if (x < 0) x = 0;
        if (y < 0) y = 0;
        if (x > rect.width  - LENS_W) x = rect.width  - LENS_W;
        if (y > rect.height - LENS_H) y = rect.height - LENS_H;

        lens.style.left = x + 'px';
        lens.style.top  = y + 'px';

        const nw = mainImg.naturalWidth;
        const nh = mainImg.naturalHeight;
        if (!nw || !nh) return;

        // ডিসপ্লে সাইজ থেকে natural সাইজের ratio
        const ratioX = nw / rect.width;
        const ratioY = nh / rect.height;

        zoomBox.style.backgroundPosition =
            `-${x * ZOOM * ratioX}px -${y * ZOOM * ratioY}px`;
    }

    // ===== Mouse Enter: zoom শুরু =====
    mainWrap.addEventListener('mouseenter', function () {
        setupZoom();
        lens.style.display    = 'block';
        zoomBox.style.display = 'block';
    });

    // ===== Mouse Leave: zoom বন্ধ =====
    mainWrap.addEventListener('mouseleave', function () {
        lens.style.display    = 'none';
        zoomBox.style.display = 'none';
    });

    // ===== Mouse Move: lens নাড়ানো =====
    mainWrap.addEventListener('mousemove', moveLens);

    // ===== Thumbnail Click =====
    thumbs.forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            const newSrc = thumb.getAttribute('data-src');
            if (!newSrc) return;

            // active class আপডেট
            thumbs.forEach(function (t) { t.classList.remove('active'); });
            thumb.classList.add('active');

            // zoom লুকিয়ে রাখো যতক্ষণ নতুন ইমেজ লোড না হয়
            lens.style.display    = 'none';
            zoomBox.style.display = 'none';

            // নতুন src সেট করো
            mainImg.src = newSrc;

            // লোড হলে zoom সেটআপ করো (once: true = একবারই চলবে)
            mainImg.addEventListener('load', setupZoom, { once: true });
        });
    });

    // ===== প্রথম লোডে সেটআপ =====
    if (mainImg.complete && mainImg.naturalWidth) {
        setupZoom();
    } else {
        mainImg.addEventListener('load', setupZoom, { once: true });
    }

});
</script>
@endpush