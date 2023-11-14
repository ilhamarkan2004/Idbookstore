<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KontributorController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UlasanController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
     $categories = Kategori::get();
    return view('dashboard',['categories' => $categories]);
});


Route::get('/dashboard', function () {
    if(Auth::user()->role == 'admin'){
    return view('admin.dashboard');
    }else{
        $categories = Kategori::get();
        return view('dashboard', ['categories' => $categories]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('buku',BukuController::class)->middleware('auth');
Route::resource('kontributor',KontributorController::class)->middleware('auth');
Route::resource('market',MarketController::class);
Route::post('/keranjang',[KeranjangController::class, 'store'])->middleware('auth')->name('keranjang.store');
Route::get('/transaction/{keranjang}',[KeranjangController::class, 'show'])->middleware('auth');
Route::resource('keranjang', KeranjangController::class)->middleware('auth')->except(['store','create','edit','update','show']);
Route::get('/koleksi',[KeranjangController::class, 'koleksi'])->name('keranjang.koleksi')->middleware('auth');
Route::resource('ulasan',UlasanController::class)->middleware('auth');
Route::resource('transaksi',TransaksiController::class)->middleware('auth');


// Route::put('/pembelian/{pembelianId}/update-status/{status}', 'PembelianController@updateStatus')
//     ->name('pembelian.updateStatus');

// Route::get('/kontributor/{buku}/create', [KontributorController::class, 'create'])->middleware('auth')->name('kontributor.create');
// Route::resource('kontributor/{buku}',KontributorController::class)->middleware('auth');

// Route::get('/kontributor/create',[KontributorController::class, 'create'])->name('kontributor.create');
// Route::get('/kontributor/create', [KontributorController::class, 'create'])->middleware('auth')->name('kontributor.create');
// Route::get('/kontributor/{kontributor}/edit', [KontributorController::class, 'edit'])->name('kontributor.edit')->middleware('auth');
// Route::delete('/kontributor/{kontributor}', [KontributorController::class, 'destroy'])->name('kontributor.destroy')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth::routes(['verified' => true]);

require __DIR__.'/auth.php';
