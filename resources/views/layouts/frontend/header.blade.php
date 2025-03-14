<!-- Custom CSS for logo integration -->
<style>
  .header-logo img {
    max-height: 80px; /* Adjust this value as needed */
    object-fit: contain;
  }
</style>

<!-- Top Header -->
<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <span class="me-3">📞 {{@$siteSetting->organization_number}}</span>
        <span>📧 {{@$siteSetting->organization_email}}</span>
      </div>
    </div>
  </div>
</div>

<!-- Main Header -->
<header class="main-header py-3">
  <div class="container d-flex align-items-center">
    <!-- Logo Section -->
    <div class="header-logo me-3">
      @if(!empty($siteSetting->organization_logo))
        <img src="{{ asset('storage/' . $siteSetting->organization_logo) }}" alt="Organization Logo" class="img-fluid">
      @else
        <p>No logo uploaded.</p>
      @endif
    </div>
    <!-- Organization Info -->
    <div class="header-info">
      <h1 class="mb-0">{{@$siteSetting->organization_name}}</h1>
      <p class="mb-0">{{@$siteSetting->organization_motto}}</p>
    </div>
  </div>
</header>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="/nrn">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('history') ? 'active' : '' }}" href="{{ route('history') }}">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('board') ? 'active' : '' }}" href="{{ route('board') }}">Board Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('project') ? 'active' : '' }}" href="{{ route('project') }}">Our Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('news-events') ? 'active' : '' }}" href="{{ route('news-events') }}">News & Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ 'gallery' }}">Gallery</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
