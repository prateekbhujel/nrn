<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown">
      <a href="{{ route('admin.profile.edit') }}" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('admin.profile.edit') }}" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
        <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
              @csrf        
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                this.closest('form').submit();"
              class="dropdown-item has-icon text-danger"
              >
                <i class="fa fa-sign-out-alt"></i>Logout
              </a>
          </form>
      </div>
      </div>
    </li>
  </ul>
</nav>
