<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminFleetController;
use App\Models\Product;
use App\Models\Fleet;
use App\Models\User;



// kalau buka '/', langsung ke login
Route::redirect('/', '/login');

// ROUTE CUSTOMER (harus login)
Route::middleware(['auth'])->group(function () {
    // dashboard customer
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    })->name('customer.dashboard');

    // list produk untuk customer
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

// ROUTE ADMIN (harus login + role admin)
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // dashboard admin  <<< INI YANG TADI BELUM ADA
        Route::get('/dashboard', function () {
            $productCount  = Product::count();
            $fleetCount    = Fleet::count();
            $customerCount = User::where('role', 'customer')->count();

            return view('admin.dashboard', compact(
                'productCount',
                'fleetCount',
                'customerCount'
            ));
        })->name('dashboard');

        // CRUD produk admin
        Route::resource('products', AdminProductController::class);

        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');

        Route::resource('fleets', AdminFleetController::class);
    });

    // Manual logout route (POST)
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

