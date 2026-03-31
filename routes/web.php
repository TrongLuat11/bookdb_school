<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\QuanLyTheLoaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sach', [LayoutController::class, 'sach']);
Route::get('/sach/theloai/{id}', [LayoutController::class, 'theloai']);
Route::get('sach/chitiet/{id}', [LayoutController::class, 'chitietsach']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quản lý thể loại (Đã đưa trở lại vào trong Auth để bảo mật khi merge code)
    Route::resource('quan-ly-the-loai', QuanLyTheLoaiController::class);
});

require __DIR__.'/auth.php';
