<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/sach');
});

Route::get('/sach', [LayoutController::class, 'sach']);
Route::get('/sach/theloai/{id}', [LayoutController::class, 'theloai']);
Route::get('sach/chitiet/{id}', [LayoutController::class, 'chitietsach']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/saveinfo', [AccountController::class, 'saveaccountinfo'])->name('saveinfo');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
