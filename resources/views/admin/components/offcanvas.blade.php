<div class="offcanvas offcanvas-start text-bg-dark" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title fw-bold" id="offcanvasWithBothOptionsLabel">Toko Online Kita</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav flex-column gap-3">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link p-2 {{ Request::path() === 'admin/dashboard' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">dashboard</span>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product') }}"
                    class=" nav-link p-2 {{ Request::path() === 'admin/product' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">inventory</span>
                        <span>Product</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('userManagement') }}"
                    class=" nav-link p-2 {{ Request::path() === 'admin/user-management' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">people_alt</span>
                        <span>User Management</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('report') }}"
                    class=" nav-link p-2 {{ Request::path() === 'admin/report' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">analytics</span>
                        <span>Report</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout" class=" nav-link p-2">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">logout</span>
                        <span>Logout</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
