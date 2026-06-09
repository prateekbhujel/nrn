@extends('layouts.frontend.main')

@section('title', $event->title ?? 'Event')

@section('main-content')
<section class="page-hero page-hero--large {{ $event->banner ? 'page-hero--with-image' : '' }}">
    @if($event->banner)
        <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->title }}">
    @endif
    <div class="container">
        <div class="page-hero__content">
            <p class="section-kicker">Event</p>
            <h1 class="page-title">{{ $event->title }}</h1>
            <div class="meta-row">
                @if(!empty($event->event_date))
                    <span>{{ date('F d, Y', strtotime($event->event_date)) }}</span>
                @endif
                @if(!empty($event->location))
                    <span>{{ $event->location }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-layout">
            <article class="detail-article">
                <p class="section-kicker">Event details</p>
                <h2 class="section-title mb-4">Details</h2>
                @if($event->banner)
                    <img src="{{ asset('storage/' . $event->banner) }}" class="detail-image mb-4" alt="{{ $event->title }}">
                @endif
                <div>{!! $event->description !!}</div>
            </article>

            <aside class="detail-aside">
                <p class="section-kicker">Event info</p>
                @if(!empty($event->event_date))
                    <p><strong>Date</strong><br>{{ date('F d, Y', strtotime($event->event_date)) }}</p>
                @endif
                @if(!empty($event->location))
                    <p><strong>Location</strong><br>{{ $event->location }}</p>
                @endif
                <a class="button-link button-link--primary" href="{{ route('contact') }}">Contact us</a>
            </aside>
        </div>
    </div>
</section>
@endsection
