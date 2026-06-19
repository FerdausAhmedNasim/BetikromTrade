@extends('frontend.layouts.master')

@section('title', 'About Us')

@section('content')

@php
    $content = $about->text ?? '';

    $content = preg_replace_callback(
        '/<oembed url="https:\/\/www\.youtube\.com\/watch\?v=([^"]+)"><\/oembed>/',
        function ($matches) {
            return '<div class="ratio ratio-16x9 my-3">
                        <iframe
                            src="https://www.youtube.com/embed/' . $matches[1] . '"
                            allowfullscreen>
                        </iframe>
                    </div>';
        },
        $content
    );
@endphp

<div class="container py-5">

    <h1 class="mb-4">
        {{ $about->title ?? 'About Us' }}
    </h1>

    <div class="card">
        <div class="card-body">
            {!! $content !!}
        </div>
    </div>

</div>

@endsection