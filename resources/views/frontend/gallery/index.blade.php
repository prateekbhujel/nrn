@extends('layouts.frontend.main')

@section('title', 'Gallery')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Gallery</p>
            <h1 class="page-title">Gallery</h1>
            <p>Photo collections from association programs, gatherings, and public activities.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="gallery-grid">
            @forelse ($galleries as $gallery)
                <a href="{{ route('gallery.innerGallery', $gallery->slug) }}" class="gallery-card">
                    <img src="{{ asset('storage/' . $gallery->thumbnail) }}" class="gallery-card__image" alt="{{ $gallery->title }}">
                    <div class="gallery-card__body">
                        <h3>{{ $gallery->title }}</h3>
                        <div class="resource-card__meta">
                            @if(!empty($gallery->date))
                                <span>{{ \Carbon\Carbon::parse($gallery->date)->format('F d, Y') }}</span>
                            @endif
                            @if(!empty($gallery->location))
                                <span>{{ $gallery->location }}</span>
                            @endif
                        </div>
                        @if(!empty($gallery->description))
                            <p class="mb-0 mt-2">{{ Str::limit(strip_tags($gallery->description), 120) }}</p>
                        @endif
                    </div>
                </a>
            @empty
                <div class="empty-state">Gallery collections will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
