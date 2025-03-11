@extends('layouts.frontend.main')
@section('main-content')
  <!-- News Detail Content -->
  <div class="hero-placeholder">
  <div class="container">
    <!-- Dynamic title from the $news record -->
    <h1 class="display-4">News: {{ $news->title }}</h1>
  </div>
</div>

<!-- News Detail Content -->
<section class="section">
  <div class="container">
    <h2>News Details</h2>
    <!-- Dynamic publish date formatted using Carbon -->
    <p class="text-muted">Published on: {{ \Carbon\Carbon::parse($news->publish_date)->format('F d, Y') }}</p>
    <!-- Dynamic banner image (ensure you have a storage link if stored in storage/app/public) -->
    <img src="{{ asset('storage/' . $news->banner) }}" class="img-fluid mb-4" alt="{{ $news->title }}" />
    <!-- Dynamic description -->
    <p>
      {{ $news->description }}
    </p>
    <!-- You can add more dynamic content here if needed -->
  </div>
</section>

@endsection
