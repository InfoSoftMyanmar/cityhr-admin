<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConstantController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
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

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LanguageController::class, 'swap']);

Route::get('/', function () {
	return view('login');
});

Route::get('dashboard', function () {
	session(['tabindex' => 1]);
	return view('main-dashboard');
})->name('main.dashboard');


/*
|--------------------------------------------------------------------------
| Login Resources
|--------------------------------------------------------------------------
*/
Route::post('authenticate', [LoginController::class, 'authenticate']);

/*
|--------------------------------------------------------------------------
| Company Resources
|--------------------------------------------------------------------------
	*/
Route::match(['get', 'post'], 'company', [CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('company/create', [CompanyController::class, 'store'])->name('company.store');
Route::get('company/{uuid}', [CompanyController::class, 'show'])->name('company.show');
Route::delete('company/{uuid}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('company/{uuid}', [CompanyController::class, 'edit'])->name('company.edit');
Route::patch('company/{uuid}', [CompanyController::class, 'update'])->name('company.update');

/*
|--------------------------------------------------------------------------
| Constant Resources
|--------------------------------------------------------------------------
	*/
Route::match(['get', 'post'], 'constants', [ConstantController::class, 'index'])->name('constants.index');
Route::get('constants/create', [ConstantController::class, 'create'])->name('constants.create');
Route::post('constants/create', [ConstantController::class, 'store'])->name('constants.store');
Route::get('constants/{uuid}', [ConstantController::class, 'show'])->name('constants.show');
Route::delete('constants/{uuid}', [ConstantController::class, 'destroy'])->name('constants.destroy');
Route::get('constants/{uuid}', [ConstantController::class, 'edit'])->name('constants.edit');
Route::patch('constants/{uuid}', [ConstantController::class, 'update'])->name('constants.update');
