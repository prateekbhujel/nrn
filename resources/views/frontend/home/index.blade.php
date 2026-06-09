@extends('layouts.frontend.main')

@section('title', $siteSetting->organization_name ?? config('app.name', 'NRN Association'))

@section('main-content')
@php
    $siteName = $siteSetting->organization_name ?? config('app.name', 'NRN Association');
@endphp

@if(!empty($photoslider) && count($photoslider) > 0)
    <section id="heroCarousel" class="carousel slide home-hero" data-bs-ride="carousel" aria-label="Featured updates">
        <div class="carousel-inner">
            @foreach($photoslider as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $slider->main_image) }}" alt="{{ $slider->main_title }}">
                    <div class="carousel-caption">
                        <p class="section-kicker">Nepal and Belgium community network</p>
                        <h1>{{ $slider->main_title }}</h1>
                        <p>{{ $slider->sub_title }}</p>
                        @if(!empty($slider->category) && Route::has($slider->category))
                            <a href="{{ route($slider->category) }}" class="button-link button-link--light">
                                View {{ ucwords(str_replace('-', ' ', $slider->category)) }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
@else
    <section class="home-hero__fallback">
        <div class="container">
            <p class="section-kicker">Nepal and Belgium community network</p>
            <h1>{{ $siteName }}</h1>
            <p>Public updates, projects, leadership information, and community events from the association.</p>
            <a href="{{ route('contact') }}" class="button-link button-link--light">Contact the association</a>
        </div>
    </section>
@endif

<section class="home-intro">
    <div class="container">
        <div class="home-intro__panel">
            <div>
                <p class="section-kicker">Community office</p>
                <h2 class="section-title">A public hub for association work, programs, and member updates.</h2>
            </div>
            <a class="button-link button-link--primary" href="{{ route('about') }}">Learn about us</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Projects</p>
                <h2 class="section-title">Current initiatives</h2>
            </div>
            <p class="section-copy">Programs and community work published by the association.</p>
        </div>

        <div class="resource-grid">
            @forelse ($projects as $project)
                <article class="resource-card">
                    @if($project->main_image)
                        <img src="{{ asset('storage/' . $project->main_image) }}" class="resource-card__image" alt="{{ $project->title }}">
                    @endif
                    <div class="resource-card__body">
                        <h3 class="resource-card__title">
                            <a href="{{ route('project.show_project', $project->slug) }}">{{ $project->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($project->description), 150) }}</p>
                        <a class="resource-card__link" href="{{ route('project.show_project', $project->slug) }}">View project</a>
                    </div>
                </article>
            @empty
                <div class="empty-state">Projects will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">News</p>
                <h2 class="section-title">Latest public updates</h2>
            </div>
            <a class="button-link button-link--outline" href="{{ route('news-events') }}">All news and events</a>
        </div>

        <div class="resource-grid">
            @forelse($news as $item)
                <article class="resource-card">
                    @if($item->banner)
                        <img src="{{ asset('storage/' . $item->banner) }}" class="resource-card__image" alt="{{ $item->title }}">
                    @endif
                    <div class="resource-card__body">
                        <div class="resource-card__meta">
                            <span>{{ \Carbon\Carbon::parse($item->publish_date)->format('F d, Y') }}</span>
                        </div>
                        <h3 class="resource-card__title">
                            <a href="{{ route('news-events.show_news', $item->slug) }}">{{ $item->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($item->description), 150) }}</p>
                        <a class="resource-card__link" href="{{ route('news-events.show_news', $item->slug) }}">Read update</a>
                    </div>
                </article>
            @empty
                <div class="empty-state">News will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">Events</p>
                <h2 class="section-title">Community calendar</h2>
            </div>
            <p class="section-copy">Recent and upcoming programs, gatherings, and formal activities.</p>
        </div>

        <div class="resource-grid">
            @forelse($events as $event)
                <article class="resource-card">
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" class="resource-card__image" alt="{{ $event->title }}">
                    @endif
                    <div class="resource-card__body">
                        <div class="resource-card__meta">
                            <span>{{ date('F d, Y', strtotime($event->event_date)) }}</span>
                            @if(!empty($event->location))
                                <span>{{ $event->location }}</span>
                            @endif
                        </div>
                        <h3 class="resource-card__title">
                            <a href="{{ route('news-events.show_event', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($event->description), 140) }}</p>
                        <a class="resource-card__link" href="{{ route('news-events.show_event', $event->slug) }}">View event</a>
                    </div>
                </article>
            @empty
                <div class="empty-state">Events will appear here once published.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection
