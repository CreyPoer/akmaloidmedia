<?php

use App\Http\Controllers\DetailPemesananController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SlideShowController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProdukController;
use App\Models\KategoriProduk;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'guest'])->name('guest.home');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::get('/register', function () {return view('register');});
Route::post('/register', [UserController::class,'register'])->name('register');
Route::post('/autentikasi',[LoginController::class,'autentikasi'])->name('autentikasi');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/paket-all',[ProdukController::class,'all'])->name('paket.all');
Route::get('/kategori-produk/{id}',[ProdukController::class,'kategoriproduk'])->name('kategori.produk');
Route::get('/penerbit/{id}',[ProdukController::class,'penerbit'])->name('penerbit');
Route::post('/paket-check', [ProdukController::class, 'caricheck'])->name('check.paket');


Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix' => 'pelanggan','middleware' => 'role_pelanggan'],function(){
        Route::get('/', [UserController::class,'pelanggan'])->name('pelanggan');
        Route::get('/profile/{id}', [UserController::class,'profile'])->name('pelanggan.profile');
        Route::put('/update-pelanggan/{id}',[UserController::class,'changeprofile'])->name('update.pelanggan');

        // halaman produk
        Route::get('/produk-all',[ProdukController::class,'produkall'])->name('produk.all');
        Route::get('/kategori-paket/{id}',[ProdukController::class,'paketkategoriproduk'])->name('kategori.paket');
        Route::get('/paket-penerbit/{id}',[ProdukController::class,'paketpenerbit'])->name('paket.penerbit');
        Route::post('/produk-check', [ProdukController::class, 'checkproduk'])->name('check.produk');

        //cart
        Route::post('/addtocart', [DetailPemesananController::class, 'addtocart'])->name('add.to.cart');
        Route::get('/tampilcart/{id}', [DetailPemesananController::class, 'tampilcart'])->name('show.cart');


    });
    Route::group(['prefix' => 'admin','middleware' => 'role_admin'],function(){
        Route::get('/', function () {return view('admin.index');});

        Route::get('/usermanagement',[UserController::class,'index'])->name('admin.user');
        Route::get('/tambah-user',[UserController::class,'create'])->name('tambah.user');
        Route::post('/simpan-user',[UserController::class,'store'])->name('simpan.user');
        Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('edit.user');
        Route::put('/update-user/{id}',[UserController::class,'update'])->name('update.user');
        Route::delete('/delete-user',[UserController::class,'destroy'])->name('delete.user');

        Route::get('/kategoriproduk',[KategoriProdukController::class,'index'])->name('admin.kategoriproduk');
        Route::get('/tambah-kategori',[KategoriProdukController::class,'create'])->name('tambah.kategoriproduk');
        Route::post('/simpan-kategori',[KategoriProdukController::class,'store'])->name('simpan.kategoriproduk');
        Route::get('/edit-kategori/{id}',[KategoriProdukController::class,'edit'])->name('edit.kategoriproduk');
        Route::put('/update-kategori/{id}',[KategoriProdukController::class,'update'])->name('update.kategoriproduk');
        Route::delete('/delete-kategori',[KategoriProdukController::class,'destroy'])->name('delete.kategoriproduk');

        Route::get('/penerbit',[PenerbitController::class,'index'])->name('admin.penerbit');
        Route::get('/tambah-penerbit',[PenerbitController::class,'create'])->name('tambah.penerbit');
        Route::post('/simpan-penerbit',[penerbitController::class,'store'])->name('simpan.penerbit');
        Route::get('/edit-penerbit/{id}',[PenerbitController::class,'edit'])->name('edit.penerbit');
        Route::put('/update-penerbit/{id}',[PenerbitController::class,'update'])->name('update.penerbit');
        Route::delete('/delete-penerbit',[PenerbitController::class,'destroy'])->name('delete.penerbit');

        Route::get('/periode',[PeriodeController::class,'index'])->name('admin.periode');
        Route::get('/tambah-periode',[PeriodeController::class,'create'])->name('tambah.periode');
        Route::post('/simpan-periode',[PeriodeController::class,'store'])->name('simpan.periode');
        Route::get('/edit-periode/{id}',[PeriodeController::class,'edit'])->name('edit.periode');
        Route::put('/update-periode/{id}',[PeriodeController::class,'update'])->name('update.periode');
        Route::delete('/delete-periode',[PeriodeController::class,'destroy'])->name('delete.periode');

        Route::get('/paket',[PaketController::class,'index'])->name('admin.paket');
        Route::get('/tambah-paket',[PaketController::class,'create'])->name('tambah.paket');
        Route::post('/simpan-paket',[PaketController::class,'store'])->name('simpan.paket');
        Route::get('/edit-paket/{id}',[PaketController::class,'edit'])->name('edit.paket');
        Route::put('/update-paket/{id}',[PaketController::class,'update'])->name('update.paket');
        Route::delete('/delete-paket',[PaketController::class,'destroy'])->name('delete.paket');

        Route::get('/slideshow',[SlideShowController::class,'index'])->name('admin.slideshow');
        Route::get('/tambah-slideshow',[SlideShowController::class,'create'])->name('tambah.slideshow');
        Route::post('/simpan-slideshow',[SlideShowController::class,'store'])->name('simpan.slideshow');
        Route::get('/edit-slideshow/{id}',[SlideShowController::class,'edit'])->name('edit.slideshow');
        Route::put('/update-slideshow/{id}',[SlideShowController::class,'update'])->name('update.slideshow');
        Route::delete('/delete-slideshow',[SlideShowController::class,'destroy'])->name('delete.slideshow');
    });
});


// Route::get('/profile', function () {
//     return view('user.profile');
// });
// Route::get('/produk', function () {
//     return view('guest.produk');
// });

Route::get('/cart', function () {
    return view('user.cart');
});
// Route::get('/riwayatpesanan', function () {
//     return view('user.riwayatpesanan');
// });
// Route::get('/register', function () {
//     return view('register');
// });
