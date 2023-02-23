<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\WorkerController;

use App\Http\Controllers\ProfileController;


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

// start admin routes
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
Route::get('/offers/removeUser/{user}', [OfferController::class,"removeUser"])->name("offers.removeUser");
Route::get('/offers/removeWorker/{worker}', [OfferController::class,"removeWorker"])->name("offers.removeWorker");
// worker
Route::get('/workers', [WorkerController::class, 'index'])->name('workers');
Route::get('workers/create', [WorkerController::class, 'create'])->name('workers.create');
Route::post('workers/store/', [WorkerController::class, 'store'])->name('workers.store');
Route::get('workers/edit/{worker}', [WorkerController::class, 'edit'])->name('workers.edit');
Route::put('workers/update/{worker}',[WorkerController::class, 'update'])->name('workers.update');
Route::delete('delete/{worker}',[WorkerController::class, 'destroy'])->name('workers.destroy');
// end admin routes

// start worker routes
// profile
Route::get('/worker-profile', [ProfileController::class,"index"])->name("worker.profile");
// end worker routes
