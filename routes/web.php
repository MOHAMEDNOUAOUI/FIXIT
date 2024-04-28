<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DepanneurController;
use App\Http\Controllers\DepanneurRatingsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\Metier;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceAppointementsController;
use App\Http\Controllers\TicketAnswerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\DepanneurMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotLoggedIn;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => '/auth'], function () {
    Route::get('/login', [AuthController::class , 'Login'])->name("login")->middleware([RedirectIfAuthenticated::class]);
    Route::post('/loginrcreate' , [AuthController::class , 'LoginForm'])->name('loginform')->middleware([RedirectIfAuthenticated::class]);
    Route::get('/register', [AuthController::class , 'RegisterPage'])->name('register')->middleware([RedirectIfAuthenticated::class]);
    Route::post('/registercreate' , [AuthController::class , 'RegisterForm'])->name('registerform')->middleware([RedirectIfAuthenticated::class]);
    Route::get('/logout' ,[AuthController::class , 'logout'])->name('logout');
});







Route::middleware([ClientMiddleware::class ,'auth'])->group(function () {
    Route::get('/', [ClientController::class  , 'index'])->name('HOME');
    Route::get('/services' , [ClientController::class , 'services'])->name('client_services');
    Route::get('/appointements' , [ClientController::class , 'appointement'])->name('client_appointements');
    Route::resource('reservation' , ServiceAppointementsController::class);
    Route::get('/support' , [ClientController::class , 'support'])->name('support');
    Route::get('/ticketshow' , [TicketController::class , 'ticketshow'])->name('ticketshow');
    Route::POST('/ticketsearch' , [TicketController::class , 'ticketsearch'])->name('ticketsearch');
    Route::resource('ticket' , TicketController::class);
    Route::resource('ticketanswer' , TicketAnswerController::class);
    Route::resource('Rating' , DepanneurRatingsController::class);
});



Route::middleware([AdminMiddleware::class , 'auth'])->group(function () {
    Route::get('/MetierAdmin/services/add' , [MetierController::class , 'add_admin'])->name('admin.services.add');
    Route::resource('MetierAdmin' , MetierController::class);


    Route::post('/Admin/Profile/update' , [UserController::class , 'update'])->name('update_profile');


    Route::post('Admin/Tickets' , [TicketController::class , 'filter'])->name('filter_tickets');
    Route::resource('TicketsAdmin' , TicketController::class);


    Route::get('/Admin/Analytics/Subscriptions' , [AdminController::class , 'index_Subscription'])->name('index_Subscription');
    Route::get('/Admin/Customers/index' , [AdminController::class , 'index_Customers'])->name('index_Customers');
    Route::get('/Admin/Customers/client' , [AdminController::class , 'client_Customers'])->name('client_Customers');
    Route::get('/Admin/Customers/depaneur' , [AdminController::class , 'depaneur_Customers'])->name('depaneur_Customers');
    Route::get('/Admin/Profile' , [AdminController::class , 'profile'])->name('Admin_profile');
    Route::resource('Admin' , AdminController::class);



    Route::post('/search-banned', [UserController::class , 'searchBanned'])->name('search.banned');
    
});

Route::post('/locations', [LocationController::class, 'store'])
    ->name('locations.store')
    ->middleware('auth');

    Route::get('/profile', [AuthController::class, 'profile'])
    ->name('profile')
    ->middleware('auth');

    Route::resource('notification' , NotificationController::class)->middleware('auth');
    Route::post('/reservation/filter' , [ServiceAppointementsController::class , 'filtering'])->name('filtering')->middleware('auth');

Route::middleware([DepanneurMiddleware::class , 'auth'])->group(function () { 
    Route::post('/res/status' , [ServiceAppointementsController::class , 'statusupdate'])->name('statusupdate');
    Route::get('/Depanneur/services' , [DepanneurController::class , 'services'])->name('Depanneur.services');
   
    Route::post('/Depanneur/availability', [DepanneurController::class , 'Available'])->name('available');
    Route::resource('Depanneur' , DepanneurController::class);
});



