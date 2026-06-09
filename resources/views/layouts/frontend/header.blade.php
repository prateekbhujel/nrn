@php
  $siteName = $siteSetting->organization_name ?? config('app.name', 'NRN Association');
  $siteMotto = $siteSetting->organization_motto ?? 'Community, connection, and service.';
@endphp

<div class="site-topbar">
  <div class="container">
    <div class="site-topbar__inner">
      <div class="site-topbar__contacts">
        @if(!empty($siteSetting->organization_number))
          <a href="tel:{{ $siteSetting->organization_number }}">Phone: {{ $siteSetting->organization_number }}</a>
        @endif
        @if(!empty($siteSetting->organization_email))
          <a href="mailto:{{ $siteSetting->organization_email }}">Email: {{ $siteSetting->organization_email }}</a>
        @endif
      </div>
      <a class="site-topbar__link" href="{{ route('contact') }}">Contact the association</a>
    </div>
  </div>
</div>

<header class="main-header">
  <div class="container">
    <div class="main-header__inner">
      <a class="brand-lockup" href="{{ route('home') }}" aria-label="{{ $siteName }}">
        <span class="brand-lockup__mark">
          @if(!empty($siteSetting->organization_logo))
            <img src="{{ asset('storage/' . $siteSetting->organization_logo) }}" alt="{{ $siteName }} logo">
          @else
            NRN
          @endif
        </span>
        <span class="brand-lockup__text">
          <span class="brand-lockup__name">{{ $siteName }}</span>
          @if(!empty($siteMotto))
            <span class="brand-lockup__motto">{{ $siteMotto }}</span>
          @endif
        </span>
      </a>

      <div class="header-flags" aria-label="Nepal and Belgium">
        <img src="{{ asset('assets/Animated-Flag-Nepal.gif') }}" alt="Nepal flag">
        <img src="{{ asset('assets/Belgium_240-animated-flag-gifs.gif') }}" alt="Belgium flag">
      </div>
    </div>
  </div>
</header>

<nav class="navbar navbar-expand-lg site-nav" aria-label="Primary navigation">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav site-nav__list">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
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
          <a class="nav-link {{ request()->routeIs('gallery*') ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
