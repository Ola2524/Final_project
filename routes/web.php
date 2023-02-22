<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;

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

Route::get('/', [HomeController :: class, "index"])->name('index');
// users
Route::resource('/user',UserController ::class);

// services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/service', [ServiceController::class, 'store'])->name('services.store'); //post
Route::get('/services/{services}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{services}', [ServiceController::class, 'update'])->name('services.update'); //PUT
Route::delete('/services/{services}', [ServiceController::class, 'destroy'])->name('services.destroy');//delete

//jobs list 
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

// offers
Route::get('/offers', [OfferController::class,"index"])->name("offers");
Route::get('/offers/{user}', [OfferController::class,"remove"])->name("offers.remove");
