<?php

use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('products/show/{product}', [App\Http\Controllers\ProductController::class,'show'])->name('products.show');

//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/search', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');
Route::get('/home/Orderby/desc', [App\Http\Controllers\HomeController::class, 'desc'])->name('desc');
Route::get('/home/Orderby/asc', [App\Http\Controllers\HomeController::class, 'asc'])->name('asc');
Route::get('/home/{category}', [App\Http\Controllers\HomeController::class, 'ProductbyCategory'])->name('products.category');
/**/ 
Route::get('/Cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('/AddToCart/{product}', [App\Http\Controllers\CartController::class, 'AddToCart'])->name('cart.add');
Route::put('/Cart/{product}/update', [App\Http\Controllers\CartController::class, 'UpdateCart'])->name('cart.update');
Route::delete('/RemoveFromCart/{product}', [App\Http\Controllers\CartController::class, 'DeleteCart'])->name('cart.delete');
/**/ 

Route::middleware(['auth'])->group(function(){
    Route::post('/ConfirmOrder', [App\Http\Controllers\OrderController::class, 'create'])->name('confirm.order');
    Route::get('/MyOrders', [App\Http\Controllers\OrderController::class, 'show'])->name('orders');
    Route::delete('/deleteOrder/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('delete.order');
    Route::put('/orders/cancel/{id}', [App\Http\Controllers\OrderController::class, 'cancel'])->name('order.cancel');
    Route::resource('Feedback', App\Http\Controllers\FeedbackController::class)->except(['show']);

});
Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin','as'=>'admin.'], function(){
    
    Route::get('/dashboard', [App\Http\Controllers\ProductController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', App\Http\Controllers\ProductController::class)->except(['show']);
    Route::resource('categories', App\Http\Controllers\CategoryController::class)->except(['show']);;
    Route::get('/search/products', [App\Http\Controllers\ProductController::class, 'search'])->name('searchprod');
    Route::get('/AllAdmins', [App\Http\Controllers\AdminController::class, 'index'])->name('Alladmins');
    Route::get('/searchuser', [App\Http\Controllers\AdminController::class, 'search'])->name('searchuser');
    Route::put('/admins/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('Alladmins.update');
    Route::get('/Orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/Order/{id}', [App\Http\Controllers\OrderController::class, 'showOrder'])->name('showOrder');
    Route::get('/customers', [App\Http\Controllers\AdminController::class, 'customers'])->name('customers');
    Route::resource('status', App\Http\Controllers\StatusController::class)->except(['show','destroy']);
    Route::put('/orders/update/{id}', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::get('/orders/invoice/{id}', [App\Http\Controllers\OrderController::class, 'invoice'])->name('orders.invoice');

});

/**/ 





