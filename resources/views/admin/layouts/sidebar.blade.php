<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('admin.dashboard') }}">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('admin.dashboard') }}">CMS</a>
    </div>
    <ul class="sidebar-menu">
      <!-- Dashboard -->
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-fire"></i>
          <span>{{ db_trans('sidebar.dashboard_link') }}</span>
        </a>
      </li>

      <!-- Content Management -->
      <li class="menu-header">Content Management</li>
      <li class="{{ Request::routeIs('admin.events.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.events.index') }}">
          <i class="fas fa-calendar-alt"></i>
          <span>{{ db_trans('sidebar.events_link') }}</span>
        </a>
      </li>
      <li class="{{ Request::routeIs('admin.news.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.news.index') }}">
          <i class="fas fa-newspaper"></i>
          <span>{{ db_trans('sidebar.news_link') }}</span>
        </a>
      </li>
      <li class="{{ Request::routeIs('admin.projects.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.projects.index') }}">
          <i class="fas fa-project-diagram"></i>
          <span>Manage Projects</span>
        </a>
      </li>
      <li class="{{ Request::routeIs('admin.gallery.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.gallery.index') }}">
          <i class="fas fa-images"></i>
          <span>Manage Galleries</span>
        </a>
      </li>
      <li class="{{ Request::routeIs('admin.trans.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.trans.index') }}">
          <i class="fas fa-language"></i>
          <span>Manage Translations</span>
        </a>
      </li>

      <li class="{{ Request::routeIs('admin.languages.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.languages.index') }}">
          <i class="fas fa-language"></i>
          <span>Manage Languages</span>
        </a>
      </li>

      <!-- Organization Dropdown for Board Members, Timeline & Achievements -->
      <li class="dropdown {{ Request::routeIs('admin.board-members.*') || Request::routeIs('admin.timeline-items.*') || Request::routeIs('admin.achievements.*') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
          <i class="fas fa-building"></i>
          <span>Organization</span>
        </a>
        <ul class="dropdown-menu">
          <li class="{{ Request::routeIs('admin.board-members.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.board-members.index') }}">
              <i class="fas fa-users"></i>
              <span>Board Members</span>
            </a>
          </li>
          <li class="{{ Request::routeIs('admin.timeline-items.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.timeline-items.index') }}">
              <i class="fas fa-history"></i>
              <span>Timeline</span>
            </a>
          </li>
          <li class="{{ Request::routeIs('admin.achievements.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.achievements.index') }}">
              <i class="fas fa-trophy"></i>
              <span>Achievements</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Starter Section -->
      <li class="menu-header">Starter</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown">
          <i class="fas fa-columns"></i>
          <span>Layout</span>
        </a>
        <ul class="dropdown-menu">
          <li class="{{ Request::routeIs('admin.trans.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.trans.index') }}">
              <i class="fas fa-images"></i>
              <span>Manage Galleries</span>
            </a>
          </li>
          <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
          <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
      </li>

      <!-- Blank Page -->
      <li>
        <a class="nav-link" href="blank.html">
          <i class="far fa-square"></i>
          <span>Blank Page</span>
        </a>
      </li>

      <!-- Stisla Components -->
      <li class="menu-header">Stisla</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown">
          <i class="fas fa-th-large"></i>
          <span>Components</span>
        </a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="components-article.html">Article</a></li>
          <li><a class="nav-link" href="components-avatar.html">Avatar</a></li>
        </ul>
      </li>
    </ul>
  </aside>
</div>
