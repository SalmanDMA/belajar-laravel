<nav class="mb-3 d-flex justify-content-between bg-white p-3 rounded">
    <div class="d-flex align-items-center gap-3">
        <div class="icon-menu-hamburger d-block d-lg-none">
            <span class="material-icons" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                aria-controls="offcanvasWithBothOptions">
                menu
            </span>
        </div>
        <div class="d-flex flex-column">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active"><a href="#">{{ $name }}</a></li>
                {{-- <li class="breadcrumb-item active" aria-current="page">Library</li> --}}
            </ol>
            <span>{{ $name }}</span>
        </div>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="icon-notification">
            <span class="material-icons">
                notifications
            </span>
        </div>
        <div class="dropdown ">
            <img src="{{ asset('storage/user/' . Auth::user()->image) }}" style="width: 50px; height: 50px;"
                class="rounded-circle dropdown-toggle" alt="{{ Auth::user()->name }}" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
            <div class="dropdown-menu dropdown-menu-dark p-0">
                <div class="card text-bg-dark">
                    <div class="card-header">
                        <p class="m-0 text-center fw-bold" href="#">{{ Auth::user()->name }}</p>
                        <p class="m-0 text-center fw-bold" href="#">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="card-body">
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-gear" style="width: 20px; height: 20px;"></i>
                            <span class="ms-2">Setting</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-id-badge fs-5" style="width: 20px; height: 20px;"></i>
                            <span class="ms-2">Profile</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
