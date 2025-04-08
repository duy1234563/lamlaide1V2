<?php
use App\Http\Controllers\FruitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postregister');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route GET để hiển thị form đặt hàng
Route::get('/dathang/{id}', [FruitController::class, 'dathang'])->name('orders.dathang');

// Route POST để xử lý đơn hàng
Route::post('/dathang', [FruitController::class, 'dathang1'])->name('orders.dathang1');



Route::get('/', [FruitController::class, 'index'])->name('fruits.index');
Route::get('/danhsach', [FruitController::class, 'danhsach'])->name('fruits.danhsach');

Route::get('/fruits/create', [FruitController::class, 'create'])->name('fruits.create');
Route::post('/fruits', [FruitController::class, 'store'])->name('fruits.store');

Route::get('/fruits/{id}', [FruitController::class, 'show'])->name('fruits.show');
Route::get('/fruits/{id}/edit', [FruitController::class, 'edit'])->name('fruits.edit');
Route::put('/fruits/{id}', [FruitController::class, 'update'])->name('fruits.update');

Route::delete('/fruits/{fruit}', [FruitController::class, 'destroy'])->name('fruits.destroy');

