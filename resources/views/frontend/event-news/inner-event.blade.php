@extends('layouts.frontend.main')

@section('main-content')
<div class="hero-placeholder">
    <div class="container">
        <h1 class="display-4">Event: {{ $event->title }}</h1>
    </div>
</div>

<!-- Event Detail Content -->
<section class="section">
    <div class="container">
        <h2>Event Details</h2>
        <p class="text-muted">Date: {{ date('F d, Y', strtotime($event->event_date)) }}</p>
        <p class="text-muted">Location: {{ $event->location }}</p>
        
        <!-- Show event banner dynamically -->
        <img src="{{ asset('storage/' . $event->banner) }}" class="img-fluid mb-4" alt="Event Image" />

        <p>
        {!! $event->description !!}
        </p>
       
    </div>
</section>

  @endsection
