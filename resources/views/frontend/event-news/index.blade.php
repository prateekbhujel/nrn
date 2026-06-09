@extends('layouts.frontend.main')

@section('title', 'News & Events')

@section('main-content')
<section class="page-hero">
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Updates</p>
            <h1 class="page-title">News & Events</h1>
            <p>Public notices, announcements, programs, and event updates from the association.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">News & Events</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-heading">
            <div>
                <p class="section-kicker">News</p>
                <h2 class="section-title">Latest News</h2>
            </div>
            <p class="section-copy">Announcements and public updates published by the association.</p>
        </div>

        <div class="resource-grid">
            @forelse($news as $item)
                <article class="resource-card">
                    @if($item->banner)
                        <img src="{{ asset('storage/' . $item->banner) }}" class="resource-card__image" alt="{{ $item->title }}">
                    @endif
                    <div class="resource-card__body">
                        @if(!empty($item->publish_date))
                            <div class="resource-card__meta">
                                <span>{{ \Carbon\Carbon::parse($item->publish_date)->format('F d, Y') }}</span>
                            </div>
                        @endif
                        <h3 class="resource-card__title">
                            <a href="{{ route('news-events.show_news', $item->slug) }}">{{ $item->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($item->description), 150) }}</p>
                        <a class="resource-card__link" href="{{ route('news-events.show_news', $item->slug) }}">Read news</a>
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
                <h2 class="section-title">Upcoming Events</h2>
            </div>
            <p class="section-copy">Programs and gatherings shared through the association calendar.</p>
        </div>

        <div class="resource-grid">
            @forelse($events as $event)
                <article class="resource-card">
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->title }}" class="resource-card__image">
                    @endif
                    <div class="resource-card__body">
                        <div class="resource-card__meta">
                            @if(!empty($event->event_date))
                                <span>{{ date('F d, Y', strtotime($event->event_date)) }}</span>
                            @endif
                            @if(!empty($event->location))
                                <span>{{ $event->location }}</span>
                            @endif
                        </div>
                        <h3 class="resource-card__title">
                            <a href="{{ route('news-events.show_event', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        <p class="resource-card__text">{{ Str::limit(strip_tags($event->description), 150) }}</p>
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
