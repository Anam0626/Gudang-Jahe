<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/dashboard', [UserController::class, 'totalUsers'])->name('dashboard')->middleware('auth','admin');
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth','admin');
Route::put('/user/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth','admin');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth','admin');
Route::get('/cart', function () {
    return view('cart');
})->name('cart')->middleware('auth', 'verified');
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin')->middleware('auth','admin');

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('check_login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/check_register', [RegisterController::class, 'store']);
Route::get('/email/verify', [RegisterController::class, 'emailverify'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifverify'])->middleware(['auth', 'signed'])->name('verification.verify');
