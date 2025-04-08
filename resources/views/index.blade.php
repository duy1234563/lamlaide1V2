@extends('layout.marter')

@section('title', 'Danh sách Trái Cây')

@section('content')
<div class="container mt-4">
    <!-- Tiêu đề -->
    <h3 class="text-center text-uppercase fw-bold text-white p-3 mb-4 rounded shadow" style="background-color: #2e7d32;">
        🍉 DANH SÁCH TRÁI CÂY
    </h3>      

    <div class="row">
        <!-- Cột trái: Danh mục -->
        <div class="col-md-3 mb-4">
            <div class="rounded p-3 shadow-sm" style="background-color: #e8f5e9;">
                <h5 class="text-success fw-bold mb-3">📦 DANH MỤC SẢN PHẨM</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Hải sản nhập khẩu</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Hải sản tươi</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Hoa quả nhập khẩu</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Rau, củ sạch</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Thịt tươi</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Thực phẩm đông lạnh</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Trái cây tươi</li>
                    <li class="list-group-item bg-transparent border-0"><i class="bi bi-chevron-right text-success"></i> Đồ uống</li>
                </ul>
            </div>
        </div>

        <!-- Cột phải: Banner + Danh sách trái cây -->
        <div class="col-md-9">
            <!-- Banner -->
            <div class="mb-4">
            <img src="{{ asset('/imgthucpham/hinh11.png') }}" 
     class="img-fluid rounded shadow-sm" 
     alt="Banner trái cây" 
     style="max-height: 400px; width: auto; display: block; margin: 0 auto;">

            </div>

            <!-- Form tìm kiếm -->
            <form action="{{ route('fruits.index') }}" method="GET" class="mb-4">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control" placeholder="🔍 Tìm kiếm trái cây..." value="{{ request('search') }}">
                    <button type="submit" class="btn {{ request('search') ? 'btn-danger' : 'btn-success' }}">Tìm</button>
                </div>
            </form>

            <!-- Danh sách trái cây -->
            @if($fruits->isEmpty())
                <div class="alert alert-warning text-center shadow-sm">
                    <strong>⚠ Không có trái cây nào được tìm thấy!</strong>
                </div>
            @else
                @foreach($fruits as $name => $fruitList)
                    <div class="mb-4">
                        <h5 class="py-2 px-3 rounded-top text-white" style="background-color: #ffb300;">
                            {{ $name ?? 'Chưa phân loại' }}
                        </h5>
                        <div class="row border rounded-bottom shadow-sm p-3" style="background-color: #ffffff;">
                            @foreach($fruitList as $fruit)
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100 shadow-sm border border-success">
                                        <img src="{{ asset($fruit->image ?: 'images/fruits/default.jpg') }}" 
                                             class="card-img-top p-2" alt="{{ $fruit->name }}" 
                                             style="height: 160px; object-fit: contain;">
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title text-center fw-bold text-success">{{ $fruit->name }}</h6>
                                            <p class="text-center text-danger fw-bold mb-2">
                                                {{ number_format($fruit->price) }} đ
                                            </p>
                                            <div class="mt-auto text-center">
                                                <a href="{{ route('fruits.show', $fruit->id) }}" class="btn btn-outline-warning btn-sm me-1">Chi tiết</a>
                                                <a href="{{ route('orders.dathang', $fruit->id) }}" class="btn btn-success btn-sm">Đặt hàng</a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>  
@endsection
