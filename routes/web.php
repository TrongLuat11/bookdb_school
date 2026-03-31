<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\QuanLyTheLoaiController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SachController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/sach');
});

Route::get('/sach', [LayoutController::class, 'sach']);
Route::get('/sach/theloai/{id}', [LayoutController::class, 'theloai']);
Route::get('sach/chitiet/{id}', [LayoutController::class, 'chitietsach']);
Route::get('/testemail', [BookController::class, 'testemail'])->middleware('auth');
Route::get('/order', [BookController::class, 'order'])->name('order');
Route::post('/cart/add', [BookController::class, 'cartadd'])->name('cartadd');
Route::post('/cart/delete', [BookController::class, 'cartdelete'])->name('cartdelete');
Route::post('/order/create', [BookController::class, 'ordercreate'])->middleware('auth')->name('ordercreate');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quản lý thể loại (Đã đưa trở lại vào trong Auth để bảo mật khi merge code)
    Route::resource('quan-ly-the-loai', QuanLyTheLoaiController::class);
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/saveinfo', [AccountController::class, 'saveaccountinfo'])->name('saveinfo');

    // Quản lý sách
    Route::get('/account/sach', [SachController::class, 'index'])->name('sach.index');
    Route::get('/account/sach/create', [SachController::class, 'create'])->name('sach.create');
    Route::post('/account/sach', [SachController::class, 'store'])->name('sach.store');
    Route::get('/account/sach/{id}/edit', [SachController::class, 'edit'])->name('sach.edit');
    Route::post('/account/sach/{id}/update', [SachController::class, 'update'])->name('sach.update');
    Route::delete('/account/sach/{id}', [SachController::class, 'destroy'])->name('sach.delete');
});

require __DIR__.'/auth.php';
