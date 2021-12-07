<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MascotasController;

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
    return view('auth.login');
});


Route::resource('mascota',MascotasController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\MascotasController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
     Route::get('/home', [App\Http\Controllers\MascotasController::class, 'index'])->name('home');
});

Route::get('/send-mail', [App\Http\Controllers\MailController::class, 'enviarEmail']);