<header class="navbar navbar-dark sticky-top bg-orange flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-respon" href="/dashboard">Respon Dashboard</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="w-100 bg-orange border-0" disabled type="text">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="nav-link px-3 bg-orange text-respon border-0">Logout <span data-feather="log-out"></span></button>
      </form>
    </div>
  </div>
</header>