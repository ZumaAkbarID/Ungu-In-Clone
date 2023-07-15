<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Link\Create;
use App\Http\Controllers\Link\Lists;
use App\Http\Controllers\Main;
use App\Http\Controllers\Profile\Edit;
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

Route::get('/', [Main::class, 'index'])->name('Landing');

// Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [Register::class, 'form'])->name('Auth.Register');
    Route::post('/register', [Register::class, 'process']);
    Route::get('/login', [Login::class, 'form'])->name('Auth.Login');
    Route::post('/login', [Login::class, 'process']);
});
Route::get('/logout', [Logout::class, 'process'])->middleware('auth')->name('Auth.Logout');

// Dashboard
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [Dashboard::class, 'index'])->name('Dashboard');

    // Create new Link
    Route::get('/create', [Create::class, 'form'])->name('Dashboard.CreateLink');
    Route::get('/links', [Lists::class, 'index'])->name('Dashboard.Links');
    Route::get('/links/{shorten}', [Lists::class, 'detail'])->name('Dashboard.Links.Detail');

    // Profile Edit
    Route::get('/profile/edit', [Edit::class, 'form'])->name('Dashboard.Profile.Edit');
    Route::post('/profile/edit', [Edit::class, 'process']);

    Route::get('/whats-new', [Dashboard::class, 'whatsNew'])->name('Dashboard.WhatsNew');
});
Route::post('/create', [Create::class, 'process'])->name('CreateLink');
