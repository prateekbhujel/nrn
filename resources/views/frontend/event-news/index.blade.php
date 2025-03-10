@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">News & Events</h1>
      <p class="lead">Stay updated with our latest news and upcoming events</p>
    </div>
  </div>

  <!-- Latest News Section -->
  <section class="section">
    <div class="container">
      <h2 class="text-center mb-5">Latest News</h2>
      <div class="row">
        <!-- News Card -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">News Image (400x250)</div>
            <div class="card-body">
              <h3>
                <a href="news-detail.html" class="text-decoration-none">News Title 1</a>
              </h3>
              <p class="text-muted">February 20, 2025</p>
              <p>Summary of the news item goes here...</p>
            </div>
          </div>
        </div>
        <!-- Repeat similar cards as needed -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">News Image (400x250)</div>
            <div class="card-body">
              <h3>
                <a href="news-detail.html" class="text-decoration-none">News Title 2</a>
              </h3>
              <p class="text-muted">February 18, 2025</p>
              <p>Summary of the news item goes here...</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">News Image (400x250)</div>
            <div class="card-body">
              <h3>
                <a href="news-detail.html" class="text-decoration-none">News Title 3</a>
              </h3>
              <p class="text-muted">February 15, 2025</p>
              <p>Summary of the news item goes here...</p>
            </div>
          </div>
        </div>
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
