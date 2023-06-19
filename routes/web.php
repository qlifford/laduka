<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});
*/
route::get('/',[DashboardController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    
    route::get('/redirect',[DashboardController::class,'redirect'])->middleware('auth', 'verified');

    route::get('/view_category',[AdminController::class,'view_category']);
    route::post('/add_category',[AdminController::class,'add_category']);
    route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
    route::get('/view_product',[AdminController::class,'view_product']);
    route::post('/add_product',[AdminController::class,'add_product']);
    route::get('/show_product',[AdminController::class,'show_product']);
    route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
    route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
    route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

    route::get('/product_details/{id}',[DashboardController::class,'product_details']);
    route::post('/add_cart/{id}',[DashboardController::class,'add_cart']);
    route::get('/show_cart',[DashboardController::class,'show_cart']);
    route::get('/remove_cart/{id}',[DashboardController::class,'remove_cart']);
    route::get('/cash_order',[DashboardController::class,'cash_order']);
    route::get('/stripe/{totalprice}',[DashboardController::class,'stripe']);

    Route::post('/stripe/{totalprice}',[DashboardController::class, 'stripePost'])->name('stripe.post');
    Route::get('/order',[AdminController::class, 'order']);
    Route::get('/delivered/{id}',[AdminController::class, 'delivered']);
    Route::get('/print_pdf/{id}',[AdminController::class, 'print_pdf']);
    Route::get('/send_mail/{id}',[AdminController::class, 'send_mail']);
    Route::post('/send_user_mail/{id}',[AdminController::class, 'send_user_mail']);
    Route::get('/search',[AdminController::class, 'searchdata']);
