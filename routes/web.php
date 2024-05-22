<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login', [AuthController::class, 'formLogin'])->name('formLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/verify-account/{email}', [AuthController::class, 'verify'])->name('verify');

Route::get('/register', [AuthController::class, 'formRegister'])->name('formRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/change-password', [AuthController::class, 'change_password'])->name('change_password')->middleware('client');
Route::put('/change-password/{user}', [AuthController::class, 'check_change_password'])->name('check_change_password')->middleware('client');

Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('/forgot-password', [AuthController::class, 'check_forgot_password'])->name('check_forgot_password');

Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}', [AuthController::class, 'check_reset_password'])->name('check_reset_password');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('auth/facebook', function(){
    return Socialite::driver('facebook')->redirect();
});

Route::get('auth/facebook/callback', function(){
    return 'Callback login facebook';
});


//Client
Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile')->middleware('client');
Route::put('/profile/{user}', [ClientController::class, 'up_profile'])->name('client.up_profile')->middleware('client');
Route::get('/introduce', [ClientController::class, 'introduce'])->name('client.introduce');
Route::get('/rooms', [ClientController::class, 'rooms'])->name('client.rooms');
Route::get('/rooms/{id}', [ClientController::class, 'room_detail'])->name('client.room_detail');
Route::get('/news', [ClientController::class, 'news'])->name('client.news');
Route::get('/news/{id}', [ClientController::class, 'news_detail'])->name('client.news_detail');
Route::get('/contact', [ClientController::class, 'contact'])->name('client.contact');
Route::post('/contact', [ClientController::class, 'send_contact'])->name('client.send_contact');
Route::post('/cmt', [ClientController::class, 'comment'])->name('client.cmt');

Route::post('/booking', [ClientController::class, 'booking'])->name('client.booking');
Route::get('/booking/momo/{order}', [ClientController::class, 'momo'])->name('client.booking.momo');
Route::get('/booking/processMoMo', [ClientController::class, 'process_momo'])->name('client.booking.process_momo');

//Admin
Route::prefix('admin')->group(function () {
    //Cả admin và nvien
    Route::get('/index', [AdminController::class, 'index'])->name('admin.index')->middleware('employee');
    Route::resource('/booking', BookingController::class)->middleware('employee');
    Route::resource('/comment', CommentController::class)->middleware('employee');
    Route::resource('/contact', ContactController::class)->middleware('employee');
    Route::get('/booking/{id}/export-pdf}', [BookingController::class, 'XuatHoaDon'])->name('booking.xuatHoaDon')->middleware('employee');

    //Chỉ admin
    Route::resource('/user', UserController::class)->middleware('admin');
    Route::get('/employee', [UserController::class, 'employee'])->name('user.employee')->middleware('admin');
    Route::get('/customer', [UserController::class, 'customer'])->name('user.customer')->middleware('admin');
    Route::resource('/room', RoomController::class)->middleware('admin');
    Route::resource('/news', NewsController::class)->middleware('admin');
    Route::resource('/slide', SlideController::class)->middleware('admin');
});
