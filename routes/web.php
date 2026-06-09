<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/remove-from-cart', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

// ADMIN LOGIN KISMI
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    if ($request->username === 'user123' && $request->password === '12345') {
        session(['admin_logged' => true]);
        return redirect()->route('admin.dashboard');
    }
    return back();
})->name('admin.login.post');

// ADMIN PANELLERI
Route::get('/admin-panel', function () {
    if (!session('admin_logged')) return redirect()->route('admin.login');
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products', function () {
    if (!session('admin_logged')) return redirect()->route('admin.login');
    return view('admin.products');
})->name('admin.products');

Route::get('/admin/products/create', function () {
    if (!session('admin_logged')) return redirect()->route('admin.login');
    return view('admin.products-create');
})->name('admin.products.create');

Route::get('/admin/orders', function () {
    if (!session('admin_logged')) return redirect()->route('admin.login');
    return view('admin.orders');
})->name('admin.orders');

// ADMIN CRUD İŞLEMLERİ
Route::post('/admin/products/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');
Route::get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
