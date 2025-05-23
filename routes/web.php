<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;

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
// die();
Route::get('/', function () {
	// return view('welcome');
	return redirect()->away('https://education.trusttrain.com/');
});
Route::get('data_mgn/check_in', [AuthController::class,'index'])->name('login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('proses_login',[AuthController::class,'proses_login'])->name('proses_login');
// Route::get('build', [HomeController::class, 'index'])->name('build');
// Route::get('init-user', [ProfileController::class,'IdenUser'])->name('init-user');
