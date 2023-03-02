<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\WorkerController;

use App\Http\Controllers\worker\WorkerProfileController;
use App\Http\Controllers\worker\WorkerServiceController;
use App\Http\Controllers\worker\ReqController;
use App\Http\Controllers\worker\WorkerdashbordController;
use App\Http\Controllers\worker\WorkerJobHistortyController;

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

Route::get('/',function(){return view("welcome");});

// general routes for guests
Route::get('/home', [HomeController::class,"show"])->name("index");
Route::get('/contact-us', function(){return view('user.contact Us');})->name('contact');
Route::get('/about-us', function(){return view('user.About Us');})->name('about');
Route::get('/login', function(){return view('user.login');})->name('login');

// start admin routes
Route::get('/admin', [AdminController :: class, "index"])->name('admin');
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
Route::get('/dashbordWorker', [WorkerdashbordController::class,"index"])->name("dashbordWorker");

// service
Route::get('/worker-services', [WorkerServiceController::class, 'index'])->name('worker.services');
Route::get('/worker-service/create', [WorkerServiceController::class, 'create'])->name('worker.services.create');
Route::post('worker-service/store/', [WorkerServiceController::class, 'store'])->name('worker.services.store');
Route::get('worker-service/edit/{service}', [WorkerServiceController::class, 'edit'])->name('worker.services.edit');
Route::put('worker-service/update/{service}',[WorkerServiceController::class, 'update'])->name('worker.services.update');
Route::delete('worker-service/delete/{service}',[WorkerServiceController::class, 'destroy'])->name('worker.services.destroy');
// profile
Route::get('/worker-profile', [WorkerProfileController::class,"index"])->name("worker.profile");
Route::get('/verify', [WorkerProfileController::class,"verify"])->name("verify");
Route::post('/store-verify/{worker}', [WorkerProfileController::class,"verified"])->name("verify.update");
Route::get('profile/edit/{worker}', [WorkerProfileController::class, 'edit'])->name('profile.edit');
Route::post('/update-profile/{worker}', [WorkerProfileController::class,"update"])->name("profile.update");

// jobs requests 
Route::get('/req', [ReqController::class,"index"])->name("req");

Route::get('/reg/{job}', [ReqController::class,"remove"])->name("reg.remove");

Route::get('/reg-add/{add}', [ReqController::class,"add"])->name("reg.add");

// jobs history
Route::get('/jobHistorty', [WorkerJobHistortyController::class, 'index'])->name('jobHistorty');

// end worker routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
