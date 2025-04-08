<header class="bg-white border-bottom py-2">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-md-3 d-flex align-items-center">
            <img src="{{ asset('/imgthucpham/hinh12.png') }}" 
     class="img-fluid rounded shadow-sm" 
     alt="Banner trái cây" 
     style="max-height: 400px; width: auto; display: block; margin: 0 auto;">
                <span class="fs-4 fw-bold text-success ms-2"></span>
            </div>

            <!-- Contact and Info -->
            <div class="col-md-6">
                <div class="d-flex justify-content-between">
                    <div><i class="bi bi-telephone-fill text-success"></i> Điện thoại: 0123.456.789</div>
                    <div><i class="bi bi-envelope-fill text-success"></i> Email: contact@demo.com</div>
                </div>
                <div class="d-flex justify-content-between mt-1">
                    <div><i class="bi bi-truck text-success"></i> Miễn phí vận chuyển - Bán kính 5 km</div>
                    <div><i class="bi bi-clock text-success"></i> Giờ làm việc: 6h00 - 22h00 (T2 - CN)</div>
                </div>
            </div>

            <!-- Account & Cart -->
            <div class="col-md-3 text-end">
            <form action="{{ route('login') }}" method="GET">
    <button type="submit" class="btn btn-outline-success me-2"><i class="bi bi-person"></i> Đăng nhập</button>
</form>

<!-- Đăng ký -->
<form action="{{ route('register') }}" method="GET">
    <button type="submit" class="btn btn-outline-success me-2"><i class="bi bi-person"></i> Đăng ký</button>
</form>
                <a href="#" class="btn btn-success"><i class="bi bi-cart-fill"></i> Giỏ hàng (0)</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-success bg-success mt-3">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Tin tức</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Liên hệ</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fruits.index') }}">📋 Danh sách thực phẩm</a>
                    </li>
                    @if(Route::has('fruits.danhsach'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fruits.danhsach') }}">📜 Menu thực phẩm</a>
                        </li>
                    @endif
                    @if(Route::has('fruits.create'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fruits.create') }}">➕ Thêm thực phẩm</a>
                        </li>
                    @endif
                </ul>
                <!-- Search bar -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
</header>
