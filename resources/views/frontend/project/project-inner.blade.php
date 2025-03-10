@extends('layouts.frontend.main')
@section('main-content')
  <!-- Hero Section -->
  <div class="hero-placeholder">
    <div class="container">
      <h1 class="display-4">Project: {{$project->title}}</h1>
      <p class="lead">An in-depth look at our Community Development initiative</p>
    </div>
  </div>

  <!-- Project Detail Content -->
  <section class="section">
    <div class="container">
      <h2>About the Project</h2>
      <p>
        This project is focused on uplifting local communities through infrastructure development,
        skill training, and job creation. Our initiative has already impacted hundreds of lives across
        Nepal, driving sustainable growth and empowerment.
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
        <div class="col-md-4">
          <a href="https://placehold.co/400x300?text=Gallery+Image+1" class="glightbox" data-gallery="project-gallery">
            <img src="https://placehold.co/400x300?text=Gallery+Image+1" class="img-fluid" alt="Gallery Image 1" />
          </a>
          <h4>Gallery Title 1</h4>
          <p>Short description for image 1.</p>
        </div>
        <div class="col-md-4">
          <a href="https://placehold.co/400x300?text=Gallery+Image+2" class="glightbox" data-gallery="project-gallery">
            <img src="https://placehold.co/400x300?text=Gallery+Image+2" class="img-fluid" alt="Gallery Image 2" />
          </a>
          <h4>Gallery Title 2</h4>
          <p>Short description for image 2.</p>
        </div>
        <div class="col-md-4">
          <a href="https://placehold.co/400x300?text=Gallery+Image+3" class="glightbox" data-gallery="project-gallery">
            <img src="https://placehold.co/400x300?text=Gallery+Image+3" class="img-fluid" alt="Gallery Image 3" />
          </a>
          <h4>Gallery Title 3</h4>
          <p>Short description for image 3.</p>
        </div>
      </div>
    </div>
  </section>
  @endsection