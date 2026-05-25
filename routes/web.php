<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\CommandeController;

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


Route::get('/',[RootController::class,"accueil"])->name("accueil");
Route::get('/nos-cartes',[RootController::class,"accueil"])->name("nos-cartes");

Route::get('/register',[RootController::class,"register"])->name("register")->middleware(["is.not.connected"]);
Route::post('/register',[RootController::class,"register_store"])->name("register.store");

Route::get('/connect',[RootController::class,"connect"])->name("connect")->middleware(["is.not.connected"]);
Route::post('/connect',[RootController::class,"connect_store"])->name("connect.store");

Route::get('/connect/reset_password',[RootController::class,"reset_password"])->name("reset.password");
Route::post('/connect/reset_password',[RootController::class,"reset_password_store"]);

Route::get('/contact',[RootController::class,"contact"])->name("contact");
Route::get('/contact',[RootController::class,"contact_store"])->name("contact.store");





require __DIR__.'/rules_routes.php';
