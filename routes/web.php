<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\PixController;
use App\Http\Controllers\BoletoController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/transfer', [TransferController::class, 'index'])->name('transfer.index');
Route::post('/transfer', [TransferController::class, 'create'])->name('transfer.create');

Route::get('/extrato', [ExtratoController::class, 'index'])->name('extrato.index');
Route::post('/extrato', [ExtratoController::class, 'create'])->name('extrato.create');

Route::get('/pix/random', [PixController::class, 'random'])->name('pix.random');
Route::get('/pix/pagar', [PixController::class, 'pagar'])->name('pix.pagar');
Route::get('/pix', [PixController::class, 'index'])->name('pix.index');
Route::get('/pix/create', [PixController::class, 'create'])->name('pix.create');
Route::post('/pix/store', [PixController::class, 'store'])->name('pix.store');
Route::get('/pix/show', [PixController::class, 'show'])->name('pix.show');
Route::get('/pix/{pix}/edit', [PixController::class, 'edit'])->name('pix.edit');
Route::post('/pix/{pix}', [PixController::class, 'update'])->name('pix.update');
Route::delete('/pix/{pix}', [PixController::class, 'destroy'])->name('pix.destroy');

Route::get('/boleto', [BoletoController::class, 'index'])->name('boleto.index');

Route::get('/pagamentos', function() {
    return view('pagamentos');
})->name('pagamentos');
require __DIR__.'/auth.php';
