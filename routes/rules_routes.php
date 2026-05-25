<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RootController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\CommandeController;



Route::middleware('is.connected')->group(function () {
    
    Route::get('/logged_in',[RootController::class,"logged_in"])->middleware(["is.connected"]);
    Route::get('/logged_in/view_commandes',[CommandeController::class,"view_commandes"])->name("logged_in.view_commandes");
    Route::get('/logged_in/remove_commandes/{id}/{page}',[CommandeController::class,"remove_commandes"])->name("logged_in.remove_commandes")->whereNumber('id')->where("page",'.*');
    Route::get('/logged_in/add_commandes/{id}',[CommandeController::class,"add_commandes"])->name("logged_in.add_commandes")->whereNumber('id');

});

Route::middleware(['is.connected',"is.admin"])->group( function(){

    Route::get('/gestion',[GestionController::class,'gestion'])->name("gestion");

    Route::get('/authenticate/{path}',[RootController::class,"authenticate"]);

    Route::get('/delete/{id}/{page}',[GestionController::class,"gestion_delete"])->name("delete")->whereNumber('id');
    Route::get('delete_validation/{id}/{page}',[GestionController::class,"gestion_delete_validation"])->name("delete_validation");

    Route::get('gestion/modifie/{id}/{page}',[GestionController::class,"gestion_modifie"])->whereNumber('id');
    Route::post('gestion/modifie/{id}/{page}',[GestionController::class,"gestion_modifieCatch"])->name("gestion_modifieCatch");

    Route::get('/list',[ItemController::class,"list"])->name("list");

    Route::get('/list/add',[ItemController::class,"add_item"])->name("list.add");
    Route::post('/list/add',[ItemController::class,"add_item_validation"])->name("list.add.validation");

    Route::get('/list/view-{id}',[ItemController::class,"view_item"])->name("list.view")->whereNumber('id');

    Route::get('/list/modifie-{id}',[ItemController::class,"modifie_item"])->name("list.modifie")->whereNumber('id');
    Route::post('/list/modifie-{id}',[ItemController::class,"modifie_item_store"])->name("list.modifie.store")->whereNumber('id');

    Route::get('/list/delete-{id}',[ItemController::class,"delete_item"])->name("list.delete")->whereNumber('id');
    Route::get('/list/delete_validation-{id}',[ItemController::class,"del_item_validation"])->name("list.delete.validation")->whereNumber('id');

});
