<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\ProfitsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WorkerRegistrationController;

use App\Http\Controllers\worker\WorkerProfileController;
use App\Http\Controllers\worker\WorkerServiceController;
use App\Http\Controllers\worker\ReqController;
use App\Http\Controllers\worker\WorkerdashbordController;
use App\Http\Controllers\worker\WorkerJobHistortyController;
use App\Http\Controllers\worker\WorkerProfitsController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\AboutController;
use App\Http\Controllers\user\ServicesController;
use App\Http\Controllers\user\OrderController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HomeController;

use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\PayPalController;
use App\Http\Controllers\StripePaymentlController;
use App\Http\Controllers\WorkerreqController;
use App\Models\Service;

use App\Http\Controllers\WorkerServController;
// use App\Models\ReviewController;
use App\Http\Controllers\ReviewController;


use App\Http\Controllers\RequestController;

use App\Http\Controllers\Auth\LoginController;

// use App\Http\Controllers\user\ProfileController;

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

// Route::get('/',function(){return view("welcome");});
Route::get('/', [RegisterController::class,"index"])->name("homepage");
Route::get('/regist', [RegisterController::class,"show"])->name("registeration");
Route::get('/user-regist', [RegisterController::class, 'create'])->name('createUser');
Route::post('/registeration', [RegisterController::class, 'store'])->name('user.registration');
// Route::get('/user-login', [RegisterController::class,"login"])->name("user.login");
Route::post('/user-login/loggedin', [HomeController::class,"index"])->name("user.login.index");
Route::get('/homepage', [RegisterController::class,"index"]);


Route::get('/workerregistration', [WorkerRegistrationController::class, 'create'])->name('worker.registeration');
Route::post('/worker-register', [WorkerRegistrationController::class, 'store'])->name('worker.register');

// general routes for guests

// Route::post('/login', function(){return view('user.login');})->name('login');
// Route::get('/homepage', [HomeController::class,"homePage"])->name("homepage");
Route::get('/login', [LoginController::class,"login"])->name("login");

Route::get('/home', [HomeController::class,"show"])->name("index");
Route::get('/contact-us', [ContactController::class,'index'])->name('contact');
Route::get('/about-us', [AboutController::class,'index'])->name('about');
Route::get('/profile', [ProfileController::class,'index'])->name('user.profile');
Route::get('/our-services', [ServicesController::class, 'index'])->name('ourservices');
Route::get('/our-services/{id}', [ServicesController::class, 'show'])->name('services.show');

Route::get('/worker/profile/{id}/{service_id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/order/{id}/{worker_id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('order.show');


Route::get('/chat', [MessagesController :: class,'index'])->name('chat');


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

Route::get('/user/removeoffer/{user}', [UserController::class,"removeUser"])->name("removeOffer");

// profits
Route::get('/profits', [ProfitsController::class,"index"])->name("profits");

// worker
Route::get('/workers', [WorkerController::class, 'index'])->name('workers');
Route::get('workers/create', [WorkerController::class, 'create'])->name('workers.create');
Route::post('workers/store/', [WorkerController::class, 'store'])->name('workers.store');
Route::get('workers/edit/{worker}', [WorkerController::class, 'edit'])->name('workers.edit');
Route::put('workers/update/{worker}',[WorkerController::class, 'update'])->name('workers.update');
Route::delete('delete/{worker}',[WorkerController::class, 'destroy'])->name('workers.destroy');
// verification
Route::get('/workerreq', [WorkerreqController::class,"index"])->name("workerreq");
Route::get('/workerreq/{worker}', [WorkerreqController::class,"remove"])->name("workerreq.remove");
Route::get('/workreq-add/{worker}', [WorkerreqController::class,"add"])->name("workerreq.add");



//da la bs sibah 3bra :D
// Route::get('/workerreq/{worker}/{user}', [WorkerreqController::class,"remove"])->name("workerreq.remove");
// Route::get('/workerreq-add/{worker}/{user}', [WorkerreqController::class,"add"])->name("workerreq.add");

//contact us
Route::get('/contact-us', [ContactController::class,"adminContacts"])->name("contact.us");
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


// profits
Route::get('/profits', [ProfitsController::class,"index"])->name("profits");
Route::get('/worker/profits', [WorkerProfitsController::class, 'index'])->name('worker.profits');

// jobs requests 
Route::get('/req', [ReqController::class,"index"])->name("req");

Route::get('/reg/{job}', [ReqController::class,"remove"])->name("reg.remove");

Route::get('/reg-add/{add}', [ReqController::class,"add"])->name("reg.add");

// jobs history
Route::get('/jobHistorty', [WorkerJobHistortyController::class, 'index'])->name('jobHistorty');

// profits
Route::get('/worker/profits', [WorkerProfitsController::class, 'index'])->name('worker.profits');

// end worker routes

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//payment:


Route::get('go-payment', [PayPalController::class, 'goPayment'])->name('payment.go');

Route::get('payment',[PayPalController::class, 'payment'])->name('payment');
Route::get('cancel',[PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success', [PayPalController::class, 'success'])->name('payment.success');


//paymentstripe:

Route::get('stripe/{id}/store', [StripePaymentlController::class , 'stripe'])->name('stripe');
Route::post('stripe/{id}/post', [StripePaymentlController::class, 'stripePost'])->name('stripe.post');
Route::post('stripe/{id}/point', [StripePaymentlController::class, 'stripePoint'])->name('stripe.point');

// contact us
Route::get('/contact', function () {
    return view('user.contact',['services'=>Service::all()]);})->name("contact");

Route::post('/contact_us', [ContactController::class, 'contact_us'])->name("contact_us");

Route::get('/get_messages', [ContactController::class, 'get_messages'] )
->name("get_messages");



//review:
Route::get('/indexrev', [ReviewController::class, 'index'])->name('rev');
Route::get('/review-edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
Route::post('/review-update/{id}', [ReviewController::class, 'update'])->name('review.update');
// Route::get('/our-services', [ServicesController::class, 'index'])->name('ourservices');
// Route::get('/Review', function(){return view('user.Review',['services'=>Service::all()]);})->name('Review');



//req dashbord worker 
Route::get('AdminWorkerserv', [WorkerServController::class,'index'])->name('AdminWorkerserv');
Route::get('workers-services/{id}', [WorkerServController::class,'delete'])->name('worker.services.delete');



//search:
Route::get('/search/user', [UserController::class, 'search']);
Route::get('/search/service', [ServiceController::class, 'search']);
Route::get('/search', [OfferController::class, 'search']);
Route::get('/search/contacts', [ContactController::class, 'search']);
Route::get('/search/job', [JobController::class, 'search']);
Route::get('/search', [WorkerServiceController::class, 'search']);
Route::get('/search', [ReqController::class, 'search']);
Route::get('/search', [WorkerJobHistortyController::class, 'search']);
Route::get('/search/profits', [ProfitsController::class, 'search']);


Route::get('/requset', [RequestController::class, 'index'])->name('requset');
Route::get('/requset/{id}', [RequestController::class,"show"])->name("requset.show");

Route::get('/filter/services/desc', [ServicesController::class, 'desc']);
Route::get('/filter/services/asc', [ServicesController::class, 'asc']);

// Route::get('/order-details/{id}', [OrderController::class, 'show'])->name('order.show');



//Route::post('/{AdminWorkerserv}/restore', [WorkerServController::class, 'restore'])->name('AdminWorkerserv.restore');
//Route::delete('/{user}/force-delete', 'UsersController@forceDelete')->name('users.force-delete');
//Route::post('/restore-all',  [WorkerServController::class, 'restoreAll'])->name('AdminWorkerserv.restore-all');
