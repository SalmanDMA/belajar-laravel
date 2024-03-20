<nav class="navbar navbar-dark  navbar-expand-lg" style="background-color: #025464">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Toko Online Kita</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link  {{ Request::path() == '/' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Request::path() == 'shop' ? 'active' : '' }}"
                        href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ Request::path() == 'contacts' ? 'active' : '' }}"
                        href="{{ route('contacts') }}">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex gap-4 align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Login | Register</button>
                <div class="notif">
                    <a href="{{ route('transaksi') }}" class="fs-5">
                        <i class="fa-solid fa-bag-shopping icon-nav"></i>
                    </a>
                    @if ($count)
                        <div class="circle">{{ $count }}</div>
                    @endif
                </div>
                <div class="ml-3 notif">
                    <a href="/keranjang" class="fs-5">
                        <i class="fa-solid fa-cash-register icon-nav"></i>
                    </a>
                    @if ($count)
                        <div class="circle">{{ $count }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
