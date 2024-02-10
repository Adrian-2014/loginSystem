<?php

use App\Http\Controllers\adminControll;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mycontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\dashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Mycontroller::class, 'home']);

Route::get('/about', [Mycontroller::class, 'about']);

Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');

Route::post('/register', [registerController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

Route::post('/create', [CreateController::class, 'create'])->middleware('auth');

Route::delete('/delete{id}', [dashboardController::class, 'destroy'])->middleware('auth')->name('user.destroy');

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth')->name('dashboard.index');

Route::get('/edit/{id}', [dashboardController::class, 'edit'])->middleware('auth')->name('user.edit');

Route::put('/update/{id}', [dashboardController::class, 'update'])->middleware('auth')->name('user.update');  

Route::get('/create', [CreateController::class, 'index'])->middleware('isAdmin');


// Route::resource('/create', adminControll::class)->middleware('auth');
// Route::get('/dashboard', function() {
//     return view('dashboard.index');
// })->middleware('auth');
