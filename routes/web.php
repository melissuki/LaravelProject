<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController; // HomeController'ı içeri aktardık
use Illuminate\Support\Facades\Route;

// Ana sayfayı HomeController içindeki index fonksiyonuna bağladık
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
