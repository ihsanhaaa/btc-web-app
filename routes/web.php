<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\FishpondController;
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

Route::resource('/dashboard/pakan', FeedController::class);




Route::get('/dashboard/kolam', [FishpondController::class, 'index'])->name('kolam.index');
Route::get('/dashboard/kolam/create', [FishpondController::class, 'create'])->name('kolam.create');
Route::post('/dashboard/kolam', [FishpondController::class, 'store'])->name('kolam.store');
Route::get('/dashboard/kolam/{id}/edit', [FishpondController::class, 'edit'])->name('kolam.edit');
Route::patch('/dashboard/kolam/{id}', [FishpondController::class, 'update'])->name('kolam.update');
Route::delete('/dashboard/kolam/{id}', [FishpondController::class, 'destroy'])->name('kolam.destroy');

Route::get('/dashboard/kolam/{id}', [FishpondController::class, 'show'])->name('kolam.show');

Route::get('/dashboard/kolam/data-ikan/{id}/tambah', [FishpondController::class, 'addFish'])->name('addFish.create');
Route::post('/dashboard/kolam/data-ikan/', [FishpondController::class, 'addToDBFish'])->name('addToDBFish.create');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
