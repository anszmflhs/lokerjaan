<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Lokerjaan</a>

    <div class="nav-item text-nowrap">
    <form action="/logout" method="post">
        @csrf
      {{-- <button type="submit" class="nav-link px-3 bg-light border-0"><i class="bi bi-box-arrow-right"></i>Logout</button> --}}
  </form>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
    </div>
  </header>
