@extends('layouts.frontend.main')
@section('main-content')
<div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">Our Projects</h1>
      <p class="lead">Explore the initiatives transforming communities across Nepal</p>
    </div>
  </div>

  <!-- Projects Section -->
  <section class="section">
  <div class="container">
    <h2 class="text-center mb-5">Featured Projects</h2>
    <div class="row">
      @foreach($project as $item)
        <div class="col-md-4">
          <div class="card">
            @if($item->main_image)
              <img src="{{ asset('storage/' . $item->main_image) }}" class="card-img-top" alt="{{ $item->title }}">
            @endif
            <div class="card-body">
              <h3>
                <a href="{{ route('project.show_project', $item->slug) }}" class="text-decoration-none">
                  {{ $item->title }}
                </a>
              </h3>
              <p>{{ Str::limit($item->description, 150) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

  @endsection