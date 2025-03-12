@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">News & Events</h1>
      <p class="lead">Stay updated with our latest news and upcoming events</p>
    </div>
  </div>

  <!-- Latest News Section -->
  <section class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Latest News</h2>
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->banner) }}" class="card-img-top" alt="{{ $item->title }}">
                        <div class="card-body">
                            <h3>
                                <a href="{{ route('news-events.show_news' , $item->slug) }}" class="text-decoration-none">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($item->publish_date)->format('F d, Y') }}</p>
                            <p>{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

  <!-- Upcoming Events Section -->
  <section class="section bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Upcoming Events</h2>
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-img-placeholder">
                            <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->title }}" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h3>
                                <a href="{{route('news-events.show_event',$event->slug)}}" class="text-decoration-none">{{ $event->title }}</a>
                            </h3>
                            <p class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</p>
                            <p>{!! $event->description!!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

  @endsection
