<?php

use App\Http\Controllers\AuthController;
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

Route::view('register', 'RegisterPage')->name('register');
route::post('regUser', [AuthController::class, 'regUser'])->name('regUser');

Route::view('auth', 'AuthView')->name('auth');
Route::post('authUser', [AuthController::class, 'auth'])->name('authUser');

Route::group(['middleware' => ['auth','blockedUser'],'prefix' => 'dashboard'],function ($router){
    Route::view('/','DashboardMain')->name('DashMain');
    Route::view('/profile', 'ProfilePage')->name('profile');
    Route::view('/createTest', 'TestCreationPage')->name('createTest');
});

Route::get('eblan', function (){
    auth()->logout();;
    session()->regenerate();
    return 'еблан вышел из системы';
});

Route::view('blocked', 'blockedPage')->name('blockPage');
