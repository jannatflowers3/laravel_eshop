<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend.welcome');
// });

//frontend route 
Route::get('/', [HomeController::class, 'index']);


//admin route
Route::get('/admins', [AdminController::class, 'index']);
Route::post('/admin_dashboard', [AdminController::class, 'show_dashboard']);
// SuperAdminController route start
Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
// category route start
Route::resource('/categorys', CategoryController::class);

