@extends('layouts.frontend.main')

@section('title', 'Gallery Photos')

@section('main-content')
@php
    $galleryTitle = $galleries->first()->title ?? 'Gallery Photos';
@endphp

<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Photo collection</p>
            <h1 class="page-title">{{ $galleryTitle }}</h1>
            <p>Images from this published gallery collection.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @forelse($galleries as $gallery)
            <div class="gallery-grid">
                @forelse($gallery->banner ?? [] as $banner)
                    <a href="{{ asset('storage/' . $banner) }}" class="gallery-card glightbox" data-gallery="gallery">
                        <img src="{{ asset('storage/' . $banner) }}" class="gallery-card__image" alt="{{ $gallery->title }}">
                    </a>
                @empty
                    <div class="empty-state">Photos will appear here once published.</div>
                @endforelse
            </div>
        @empty
            <div class="empty-state">Gallery photos will appear here once published.</div>
        @endforelse
    </div>
</section>
@endsection
