@extends('layouts.frontend.main')

@section('title', 'Our Projects')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Projects</p>
            <h1 class="page-title">Our Projects</h1>
            <p>Explore initiatives, programs, and community work published by the association.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Projects</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Program catalog</p>
                <h2 class="section-title">Featured Projects</h2>
            </div>
            <p class="section-copy">Each project page contains the published description and gallery images.</p>
        </div>

        <div class="resource-grid">
            @forelse($project as $item)
                <article class="resource-card">
                    @if($item->main_image)
                        <img src="{{ asset('storage/' . $item->main_image) }}" class="resource-card__image" alt="{{ $item->title }}">
                    @endif
                    <div class="resource-card__body">
                        <h3 class="resource-card__title">
                            <a href="{{ route('project.show_project', $item->slug) }}">{{ $item->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($item->description), 150) }}</p>
                        <a class="resource-card__link" href="{{ route('project.show_project', $item->slug) }}">View project</a>
                    </div>
                </article>
            @empty
                <div class="empty-state">Projects will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
