<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;

use App\Models\SupportTicket;
use Illuminate\Support\Facades\Input;


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
    return view('welcome');
});

Route::resource('ticket', SupportTicketController::class);
Route::get('/search-token', [App\Http\Controllers\SupportTicketController::class, 'search']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);
Route::post('/reply/{id}', [App\Http\Controllers\HomeController::class, 'reply'])->name('reply');
