@extends('layouts.frontend.main')
@section('main-content')
  <!-- Hero Section -->
  <div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">Project: {{$project->title}}</h1>
      <p class="lead">{{$project->sub_motto}}</p>
    </div>
  </div>

  <!-- Project Detail Content -->
  <section class="section">
    <div class="container">
      <h2>{{$project->project_title}}</h2>
      <p>
       {{$project->project_description}}
      </p>
      <div class="row my-4">
        <div class="col-md-6">
          <!-- Main project image using a placeholder from Placehold.co -->
          <img src="{{ asset('storage/' . $project->main_image) }}" class="img-fluid" alt="{{$project->title}}" />
        </div>
        <div class="col-md-6">
          <p>
           {{$project->description}}
          </p>
        </div>
      </div>

      <!-- Gallery with Lightbox -->
      <h3 class="mt-5">Project Gallery</h3>
<div class="row">
    @foreach($projectImages as $image)
        <div class="col-md-4">
            <a href="{{ asset('storage/' . $image->image_path) }}" class="glightbox" data-gallery="project-gallery">
                <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" alt="{{ $image->title }}" />
            </a>
            <h4>{{ $image->title }}</h4>
            <p>{{ $image->description }}</p>
        </div>
    @endforeach
</div>

    </div>
  </section>
  @endsection