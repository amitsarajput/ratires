<?php
use Illuminate\Support\Facades\Route;

use ProductManager\Http\Controllers\TyreController;
use ProductManager\Http\Controllers\SearchController;
use ProductManager\Http\Controllers\AjaxHandlerController;




Route::get('/session/{key}/get',[AjaxHandlerController::class, 'get_session_data'])->name('session.get');
Route::post('/session/{key}/set',[AjaxHandlerController::class, 'set_session_data'])->name('session.set');

Route::middleware('web')->get('/',[TyreController::class, 'tyre_grid'])->name('home');
Route::geo(function () {
    //todo::Need to remove web middleware from the routes and add into the macro dynamically. or can we use method chaining with the macro itself.
    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/',[TyreController::class, 'tyre_grid'])->name('home');    
    Route::get('/{brand:slug}', [TyreController::class, 'tyre_grid'])->where(['brand'=>'[a-zA-Z\-]{3,}'])->name('tyre.grid');
    Route::get('/{brand:slug}/{tyre:slug}', [TyreController::class, 'tyre_single'])->where(['brand'=>'[a-zA-Z\-]{3,}','tyre'=>'[a-zA-Z0-9\-]{3,}'])->name('tyre.single');
}, middleware: ['web']);