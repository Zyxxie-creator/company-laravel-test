<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
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
})->name('welcome');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/new-company', function () {
    return view('new-company');
})->name('new-company');

Route::get('/dashboard', [CompanyController::class, 'index'])->name('dashboard');
Route::get('/', [CompanyController::class, 'view'])->name('welcome');

Route::get('/new-company', [CompanyController::class, 'create'])->name('company.create');
Route::post('/new-company', [CompanyController::class, 'store'])->name('company.store');
Route::delete('/new-company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('posts')->group(function () {
    Route::get('index', [CompanyController::class, 'index']);
    Route::post('store', [CompanyController::class, 'store']);
    Route::post('edit', [CompanyController::class, 'edit']);
    Route::delete('destroy', [CompanyController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
