@extends('layout.marter')

@section('content')
<div class="bg-gradient-to-r from-blue-100 to-indigo-100 min-h-screen flex items-center justify-center py-12">
    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-10 transition duration-300 hover:shadow-indigo-300">
        <h2 class="text-3xl font-extrabold text-center text-indigo-600 mb-6 animate-fade-in">✍️ Đăng ký tài khoản</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-lg text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('postregister') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-1">👤 Họ và Tên</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">📧 Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">🔒 Mật khẩu</label>
                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-400" required>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-1">🔒 Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-400" required>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-600 hover:to-blue-600 text-white font-bold py-3 rounded-xl transform hover:scale-105 transition duration-300">
                ✅ Đăng Ký
            </button>

            <p class="text-center text-gray-700 mt-4">
                📌 Đã có tài khoản?
                <a href="{{ route('login') }}" class="text-indigo-600 font-semibold hover:underline">Đăng nhập ngay</a>
            </p>
        </form>
    </div>
</div>
@endsection
