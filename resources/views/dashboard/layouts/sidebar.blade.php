<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/request-admin') ? 'active' : '' }} disabled" href="/dashboard/request-admin">
          <span data-feather="message-square"></span>
          Request Admin
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/change-password') ? 'active' : '' }} disabled" href="/dashboard/change-password">
          <span data-feather="lock"></span>
          Change Password
        </a>
      </li>
    </ul>

    @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            All Posts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/brands*') ? 'active' : '' }} disabled" href="/dashboard/brands">
            <span data-feather="smartphone"></span>
            Brands Smartphone
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} disabled" href="/dashboard/users">
            <span data-feather="user-plus"></span>
            Users Role
          </a>
        </li>
      </ul>
    @endcan

  </div>
</nav>