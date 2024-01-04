<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\ProductListController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController ;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//user rotues

Route::get('/', [UserController::class,'index'])->name('user.home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     //Checkout route 
  Route::prefix('checkout')->controller(CheckoutController::class)->group(function () {  
            Route::post('order', 'store')->name('checkout.store') ; 
            Route::get('success', 'success')->name('checkout.success');
            Route::get('cancel', 'cancel')->name('checkout.cancel');
  });



});

//end

//Add to cart 
    Route::get('cart/view', [CartController::class, 'view'])->name('cart.view') ; 
    Route::post('store/{product}', [CartController::class, 'store'])->name('cart.store') ; 
    Route::patch('cart/update/{product}', [CartController::class, 'update'])->name('cart.update') ; 
    Route::delete('cart/delete/{product}', [CartController::class, 'delete'])->name('cart.delete') ; 



//end cart route 

// Route for products list and filters 



//end for product list and filter
Route::prefix('products')->controller(ProductListController::class)->group(function () {
    Route::get('/', 'index')->name('product.index') ; 

} );


//admin routs

Route::group(['prefix' => 'admin', 'middleware' => 'redirectAdmin'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //products routes 
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/store',[ProductController::class,'store'])->name('admin.products.store');
    Route::put('/products/update/{id}',[ProductController::class,'update'])->name('admin.products.update');
    Route::delete('/products/image/{id}',[ProductController::class,'deleteImage'])->name('admin.products.image.delete');
    Route::delete('/products/destory/{id}',[ProductController::class,'destory'])->name('admin.products.destory');
    
});

//end

require __DIR__ . '/auth.php';
