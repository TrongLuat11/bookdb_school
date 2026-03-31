<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
});

require __DIR__.'/auth.php';
