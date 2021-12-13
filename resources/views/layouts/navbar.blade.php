<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <div class="navbar-logo">
        <img src="/assets/img/respon.png">
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('brands') ? 'active' : '' }}" href="/brands">Brands</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""></a>
        </li>
        
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dashboard"><span data-feather="layout"></span> My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><span data-feather="log-out"></span> Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item bg-orange rounded-pill">
            <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }} text-dark"><span data-feather="log-in"></span> Login</a>
          </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>