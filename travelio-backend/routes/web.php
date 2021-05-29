<?php

use App\Http\Controllers\Admin\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route untuk halaman utama website
Route::get('/', 'HomeController@index')
    ->name('home');

// ====================================================================

// Route untuk ke halaman Detail
Route::get('/detail/{slug}', 'DetailController@index')
    ->name('detail');

// ====================================================================

// Route untuk checkout
// Untuk memproses data checkout pada saat menekan tombol "join now" di details akan diarahkan checkout_process
// hanya sebagai transaksional (data)
// data yang sudah diinputkan akan dimasukan ke ->('CheckoutController@index')
Route::post('checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process')
    ->middleware(['auth', 'verified']);
    // auth & verified middleware bawaan laravel

// Data yang telah diinput akan dimasukan ke halaman index (mendapatkan id (transaksi))
// Menampilkan data user yang menekan tombol join now pada detail transaksi (transaction_detail)
Route::get('checkout/{id}', 'CheckoutController@index')
    ->name('checkout')
    ->middleware(['auth', 'verified']);

// menambahkan orang tambahan pada sebuah travel (invite member)
Route::post('checkout/create/{detail_id}', 'CheckoutController@create')
    ->name('checkout-create')
    ->middleware(['auth', 'verified']);

// menghapus orang yang ditambahkan pada sebuah travel 
Route::get('checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout-remove')
    ->middleware(['auth', 'verified']);

// redirect / halaman telah menyelesaikan transaksi
Route::get('checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout-success')
    ->middleware(['auth', 'verified']);

// ====================================================================

// Routes Admin
Route::prefix('admin')
->namespace('Admin')
// Tambahkan middleware auth dan isAdmin (cek di Kernel.php)
->middleware(['auth', 'isAdmin'])
->group(function() {
    // Ke halaman dashboard
    Route::get('/', 'DashboardController@index')
        ->name('dashboard');
    // travel-package (index,create,store,edit,update,destroy)
    Route::resource('travel-package', 'TravelPackageController');
    // gallery (index,create,store,edit,update,destroy)
    Route::resource('gallery', 'GalleryController');
    // Transaksi
    Route::resource('transaction', 'TransactionController');
});

Auth::routes(['verify' => true]);

// Hapus / comment kode bawaan dari auth laravel
// Route::get('/home', 'HomeController@index')->name('home');
