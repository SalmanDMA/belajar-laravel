<aside class="sidebar navbar navbar-expand-lg bg-dark d-flex flex-column navbar-dark gap-3 m-2 rounded">
    <h4 class="navbar-brand fw-bold">Toko Online Kita</h4>
    <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        <ul class="navbar-nav flex-column gap-3">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class=" nav-link {{ Request::path() === 'admin/dashboard' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">dashboard</span>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('product') }}"
                    class=" nav-link {{ Request::path() === 'admin/product' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">inventory</span>
                        <span>Product</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('userManagement') }}"
                    class=" nav-link {{ Request::path() === 'admin/user-management' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">people_alt</span>
                        <span>User Management</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('report') }}"
                    class=" nav-link {{ Request::path() === 'admin/report' ? 'active bg-secondary rounded' : '' }}">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">analytics</span>
                        <span>Report</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="logout" class=" nav-link">
                    <div class="d-flex gap-2 align-items-center">
                        <span class="material-icons">logout</span>
                        <span>Logout</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
