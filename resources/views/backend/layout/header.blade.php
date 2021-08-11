<header id="show_container_fluid" class="navbar navbar-expand-md navbar-dark sticky-top bg-dark flex-md-nowrap px-0  ">
    <a class="navbar-brand col-md-3 col-lg-2 col-sm-4 me-0 px-5 fs-4 show_container_fluid" href="#">
        Admin LTE
    </a>
    <button class="navbar-toggler d-md-none collapsed me-3 " type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container-fluid m-0 p-0">
        <input class="form-control form-control-light w-100 " type="text" placeholder="Search" aria-label="Search">
        <div class="d-flex me-3">
            <div class="nav-item text-nowrap">
                <a class="profile  text-light nav-link" href="{{ route('admin_profile',Auth::user()->id) }}">Profile</a>
            </div>
            <div class="nav-item text-nowrap">
                <a class="nav-link text-light " href="{{ route('logout') }}">Sign out</a>
            </div>
        </div>
    </div>
</header>
