<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepanneurController;
use App\Http\Controllers\Metier;
use App\Http\Controllers\MetierController;
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
    Route::get('/', function () {
        return view('client.index');
    })->name('HOME');
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


    
});

Route::middleware([DepanneurMiddleware::class , 'auth'])->group(function () {
    Route::get('/Depanneur/services' , [DepanneurController::class , 'services'])->name('Depanneur.services');
    Route::get('/Depanneur/Rating' , [DepanneurController::class , 'Rating'])->name('Depanneur.Rating');
    Route::post('/Depanneur/availability', [DepanneurController::class , 'Available'])->name('available');
    Route::resource('Depanneur' , DepanneurController::class);
});



