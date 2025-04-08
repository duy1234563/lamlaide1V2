@extends('layout.marter')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center py-12">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-purple-600 mb-6">🔐 Đăng nhập</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('postlogin') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">📧 Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">🔒 Mật khẩu</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                🚀 Đăng Nhập
            </button>

            <p class="text-center text-gray-600 mt-4">
                ❓ Chưa có tài khoản? 
                <a href="{{ route('register') }}" class="text-purple-600 font-medium hover:underline">Đăng ký ngay</a>
            </p>
        </form>
    </div>
</div>
@endsection
