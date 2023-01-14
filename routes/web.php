<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Administration\ProfilController;
use App\Http\Controllers\Administration\RegionController;
use App\Http\Controllers\Administration\LocaliteController;
use App\Http\Controllers\Administration\UserController;
use App\Http\Controllers\Administration\DirectionController;
use App\Http\Controllers\Administration\ServiceController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/admin/dashboard', function () {
    $nbUser = DB::table('users')->count();
    $nbPaper= DB::table('papers')->count();
    $nbNew = DB::table('news')->count();
    $nbConference = DB::table('conferences')->count();
    return view('backend.pages.home.index',compact('nbUser','nbPaper','nbNew','nbConference'));
});

Route::get('/', function () {
    return view('backend.pages.login');
})->name('users.login');

Route::get('/inscription', function () {
    return view('backend.pages.register');
})->name('users.register');

Auth::routes();

/**
 * All route for backend management.
 */
Route::get('user/get', [UserController::class, 'index'])->name('users.get');
Route::get('user/create', [UserController::class, 'create'])->name('users.create');
Route::post('user/store', [UserController::class, 'store'])->name('users.store');
Route::post('user/storeUser', [UserController::class, 'storeUser'])->name('users.storeUser');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('user/update/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.home');
/**
 * Profil routes
 */
Route::resource('profils', ProfilController::class);
Route::get('/profils/destroy/{id}',[ProfilController::class, 'destroy'])->name('profils.delete');

/**
 * Regions routes
 */
Route::resource('regions', RegionController::class);
Route::get('/regions/destroy/{id}',[RegionController::class, 'destroy'])->name('regions.delete');
/**
 * Localites routes
 */
Route::resource('localites', LocaliteController::class);
Route::get('/localites/destroy/{id}',[LocaliteController::class, 'destroy'])->name('localites.delete');

Route::resource('directions', DirectionController::class);
Route::get('/directions/destroy/{id}',[DirectionController::class, 'destroy'])->name('directions.delete');

Route::resource('services', ServiceController::class);
Route::get('/services/destroy/{id}',[DirectionController::class, 'destroy'])->name('services.delete');