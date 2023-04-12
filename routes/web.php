<?php

use App\Http\Controllers\DailySpendingController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FishpondController;
use App\Http\Controllers\IncomeFishController;
use App\Http\Controllers\IncomeKeratomController;
use App\Http\Controllers\SpendingFishController;
use App\Http\Controllers\SpendingKeratomController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/pakan', FeedController::class);
    Route::resource('/dashboard/pengeluaran-umum', DailySpendingController::class);
    Route::resource('/dashboard/pengeluaran-ikan', SpendingFishController::class);
    Route::resource('/dashboard/pemasukan-ikan', IncomeFishController::class);

    Route::resource('/dashboard/pengeluaran-keratom', SpendingKeratomController::class);
    Route::resource('/dashboard/pemasukan-keratom', IncomeKeratomController::class);

    Route::get('/dashboard/kolam', [FishpondController::class, 'index'])->name('kolam.index');
    Route::get('/dashboard/kolam/create', [FishpondController::class, 'create'])->name('kolam.create');
    Route::post('/dashboard/kolam', [FishpondController::class, 'store'])->name('kolam.store');
    Route::get('/dashboard/kolam/{id}/edit', [FishpondController::class, 'edit'])->name('kolam.edit');
    Route::patch('/dashboard/kolam/{id}', [FishpondController::class, 'update'])->name('kolam.update');
    Route::delete('/dashboard/kolam/{id}', [FishpondController::class, 'destroy'])->name('kolam.destroy');
    Route::get('/dashboard/kolam/{id}', [FishpondController::class, 'show'])->name('kolam.show');
    Route::get('/dashboard/kolam/data-ikan/{id}/tambah', [FishpondController::class, 'addFish'])->name('addFish.create');
    Route::post('/dashboard/kolam/data-ikan/', [FishpondController::class, 'addToDBFish'])->name('addToDBFish.create');

    Route::get('/spending_fish/export', [SpendingFishController::class, 'export']);
    Route::get('/income_fish/export', [IncomeFishController::class, 'export']);

    Route::get('/spending_keratom/export', [SpendingKeratomController::class, 'export']);
    Route::get('/income_keratom/export', [IncomeKeratomController::class, 'export']);

    Route::get('/daily_spending/export', [DailySpendingController::class, 'export']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

