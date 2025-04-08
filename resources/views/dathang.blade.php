@extends('layout.marter')

@section('title', 'Đặt Hàng')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="text-center text-uppercase fw-bold text-white p-3 rounded shadow" style="background-color: #2e7d32;">
                🛒 ĐẶT HÀNG
            </h3>

            <div class="card shadow-sm mt-4">
                <div class="row g-0">
                    <!-- Ảnh sản phẩm -->
                    <div class="col-md-4">
                        <img src="{{ asset($fruit->image ?? 'images/fruits/default.jpg') }}" 
                             class="img-fluid rounded-start" 
                             alt="{{ $fruit->name }}">
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $fruit->name }}</h5>
                            <p class="card-text">💰 Giá: <span class="text-danger fw-bold">{{ number_format($fruit->price) }} đ</span></p>
                            <p class="card-text text-muted">{{ $fruit->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form đặt hàng -->
            <form action="{{ route('orders.dathang1') }}" method="POST">
    @csrf
    <input type="hidden" name="fruit_id" value="{{ $fruit->id }}">

                <div class="mb-3">
                    <label for="customer_name" class="form-label">👤 Họ và tên</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">📞 Số điện thoại</label>
                    <input type="tel" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">📍 Địa chỉ giao hàng</label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="note" class="form-label">📝 Ghi chú (nếu có)</label>
                    <textarea name="note" class="form-control" rows="2"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">
                        ✅ Xác nhận đặt hàng
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
