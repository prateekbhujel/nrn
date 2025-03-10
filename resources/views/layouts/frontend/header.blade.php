  <!-- Top Header -->
  <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="me-3">📞 +977-1-234567</span>
                    <span>📧 info@nrb.org.np</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#" class="text-white me-2">English</a>
                    <a href="#" class="text-white">नेपाली</a>
                </div>
            </div>
        </div>
    </div>
  <!-- Main Header -->
   
  <header class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo-placeholder">NRB Logo</div>
                </div>
                <div class="col-md-9">
                    <h1>NRB Organization</h1>
                    <p class="mb-0">Empowering Communities, Building Future</p>
                </div>
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
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('home')? 'active': ''}}" href="/nrn">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('about')? 'active': ''}}" href="{{route('about')}}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('history')? 'active': ''}}" href="{{route('history')}}">History</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('board')? 'active': ''}}" href="{{route('board')}}">Board Members</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('project')? 'active': ''}}" href="{{route('project')}}">Our Projects</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('news-events')? 'active': ''}}" href="{{route('news-events')}}">News & Events</a></li>
                    <li class="nav-item"><a class="nav-link {{request()->routeIs('contact')? 'active': ''}}" href="{{route('contact')}}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{'gallery'}}">Gallery</a></li>
                </ul>
            </div>
    </nav>