<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::post('buku/cari', [BukuController::class, 'search']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/buku', [AdminController::class, 'add']);

Route::post('/admin/buku/tambah', [AdminController::class, 'store']);

Route::get('/admin/edit/buku/{id}', [AdminController::class, 'edit']);

Route::put('buku/update/{id}', [AdminController::class, 'update']);

Route::delete('buku/delete/{id}', [AdminController::class, 'delete']);

Route::get('/admin/penerbit', function () {
    return view('penerbit');
});

Route::post('/admin/penerbit/tambah', [AdminController::class, 'store_p']);

Route::get('/admin/edit/penerbit/{id}', [AdminController::class, 'edit_p']);

Route::put('penerbit/update/{id}', [AdminController::class, 'update_p']);

Route::delete('penerbit/delete/{id}', [AdminController::class, 'delete_p']);

Route::get('/pengadaan', [AdminController::class, 'pengadaan']);
