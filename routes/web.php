<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/detail_produk', function () {
    return view('detail_produk');
})->name('detail_produk');
Route::get('/cart', function () {
    return view('cart');
})->name('cart');
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'index')->name('login');
    Route::post('check_login', 'check');
});
