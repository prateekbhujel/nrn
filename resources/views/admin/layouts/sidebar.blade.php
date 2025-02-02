<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard') }}">CMS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fire"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="menu-header">Content Management</li>
      <li class="{{ Request::routeIs('admin.posts.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.posts.index') }}">
          <i class="fas fa-pencil-alt"></i><span>Posts</span>
        </a>
      </li>

      <li class="menu-header">Starter</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-columns"></i><span>Layout</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
          <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
      </li>

      <li>
        <a class="nav-link" href="blank.html"><i class="far fa-square"></i><span>Blank Page</span></a>
      </li>

      <li class="menu-header">Stisla</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Components</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="components-article.html">Article</a></li>
          <li><a class="nav-link" href="components-avatar.html">Avatar</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
