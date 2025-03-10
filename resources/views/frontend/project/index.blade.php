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
        <!-- Project Card -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">Project Image (400x300)</div>
            <div class="card-body">
              <h3><a href="project-detail.html" class="text-decoration-none">Community Development</a></h3>
              <p>Supporting local initiatives for sustainable growth and community empowerment. This project focuses on building infrastructure, creating job opportunities, and fostering local talent.</p>
            </div>
          </div>
        </div>
        <!-- Project Card -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">Project Image (400x300)</div>
            <div class="card-body">
              <h3><a href="project-detail.html" class="text-decoration-none">Education Program</a></h3>
              <p>Providing quality education to underprivileged children by establishing community learning centers and partnering with local schools and educators.</p>
            </div>
          </div>
        </div>
        <!-- Project Card -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-img-placeholder">Project Image (400x300)</div>
            <div class="card-body">
              <h3><a href="project-detail.html" class="text-decoration-none">Healthcare Initiative</a></h3>
              <p>Improving access to healthcare in rural areas through mobile clinics, community health workshops, and collaborations with local healthcare providers.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection