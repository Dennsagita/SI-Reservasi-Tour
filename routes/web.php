<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengemudiController;
use App\Models\Admin;

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
    return view('post/landing-page');
});
Route::get('/halaman1', function () {
    return view('halaman1');
});
Route::get('/paket', function () {
    return view('post/paket');
});
Route::get('/paket1', function () {
    return view('post_admin/paket');
});
Route::get('/landingpage', function () {
    return view('landingpage');
});

// Route::get('/postlogin', 'LoginController@postlogin')->name('postlogin');


Route::get('/registrasi', [AuthController::class, 'register'])->name('registrasi');
Route::post('/registrasi', [AuthController::class, 'processregistrasi'])->name('processregistrasi');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('processlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth:admin,pengemudi')->group(function () {
    Route::get('/dashboard', [ViewController::class, 'index']);
    Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('pengemudi');
    Route::get('/pengemudi-add', [PengemudiController::class, 'create']);
    Route::post('/pengemudi-insert', [PengemudiController::class, 'store']);
    Route::get('/pengemudi-edit/{id}', [PengemudiController::class, 'edit']);
    Route::put('/pengemudi/{id}', [PengemudiController::class, 'update']);

    Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
    Route::get('/mobil-add', [MobilController::class, 'create']);
    Route::post('/mobil-insert', [MobilController::class, 'store']);
    Route::get('/mobil-edit/{id}', [MobilController::class, 'edit']);
    Route::put('/mobil/{id}', [MobilController::class, 'update']);
    // Route::get('/mobil-delete/{id}', [MobilController::class, 'delete']);
    Route::delete('/mobil-delete/{id}', [MobilController::class, 'delete']);

    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/profile-admin', [AdminController::class, 'profile'])->name('profileadmin');
    Route::get('/profile-pengemudi', [PengemudiController::class, 'profile'])->name('profilepengemudi');
// Route::middleware(['auth', 'checkLevel:admin'])->group(function () {
//     // Rute untuk admin
//     Route::get('/dashboard_admin', [ViewController::class, 'index']);
});

// Route::middleware('auth:pengemudi')->group(function () {
//         Route::get('/dashboard', [ViewController::class, 'index']);
//         Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
//         Route::get('/mobil-add', [MobilController::class, 'create']);
//         Route::post('/mobil-insert', [MobilController::class, 'store']);
//         Route::get('/mobil-edit/{id}', [MobilController::class, 'edit']);
//     });

Route::middleware('auth:user')->group(function () {
        Route::get('/home', [ViewController::class, 'reservasi']);
        Route::get('/profile', [ViewController::class, 'profile'])->name('profile');
        Route::get('/profile-edit', [ViewController::class, 'profileedit'])->name('profileedit');
        Route::get('/password', [AuthController::class, 'password'])->name('resetpassword');
        Route::post('/password-reset', [AuthController::class, 'password_action'])->name('processpassword');
        Route::put('/parofile', [UserController::class, 'profile'])->name('profileupdate');
    });
// Route::middleware('auth:pengemudi')->group(function () {
//     // Route::group(['middleware' => ['auth:user,pengemudi','ceklevel:admin,pelanggan']], function (){
//         Route::get('/dashboard_admin', [ViewController::class, 'index']);
    
//         Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('pengemudi');
//         Route::get('/pengemudi-add', [PengemudiController::class, 'create']);
//         Route::post('/pengemudi-insert', [PengemudiController::class, 'store']);
//         Route::get('/pengemudi-edit/{id}', [PengemudiController::class, 'edit']);
    
    
//         Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
//         Route::get('/mobil-add', [MobilController::class, 'create']);
//         Route::post('/mobil-insert', [MobilController::class, 'store']);
//         Route::get('/mobil-edit/{id}', [MobilController::class, 'edit']);

//     });





// Route::get('/dashboard_admin', [ViewController::class, 'index']);

// Route::get('/login', [ViewController::class, 'login']);
// Route::get('/registrasi', [ViewController::class, 'register']);

// Route::get('/pengemudi', [PengemudiController::class, 'index'])->name('pengemudi');
// Route::get('/pengemudi-add', [PengemudiController::class, 'create']);
// Route::post('/pengemudi-insert', [PengemudiController::class, 'store']);
// Route::get('/pengemudi-edit/{id}', [PengemudiController::class, 'edit']);


// Route::get('/mobil', [MobilController::class, 'index'])->name('mobil');
// Route::get('/mobil-add', [MobilController::class, 'create']);
// Route::post('/mobil-insert', [MobilController::class, 'store']);
// Route::get('/mobil-edit/{id}', [MobilController::class, 'edit']);