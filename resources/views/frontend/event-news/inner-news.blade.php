@extends('layouts.frontend.main')
@section('main-content')
<div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">News: {{$news->title}}</h1>
      <p class="lead">A detailed look at our latest achievement and its impact</p>
    </div>
  </div>

  <!-- News Detail Content -->
  <section class="section">
    <div class="container">
      <h2>News Details</h2>
      <p class="text-muted">Published on:{{ date('F d, Y', strtotime($news->publish_date)) }}</p>
      <img src="{{ asset('storage/' . $news->banner) }}" class="img-fluid mb-4" alt="Event Image" />
      <p>
       {!! $news->description !!}
      </p>
    </div>
  </section>
@endsection
