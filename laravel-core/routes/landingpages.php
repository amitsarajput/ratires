<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;


Route::geo(function(){
	Route::get('/premium', [StaticPagesController::class,'landingpage'])->name('premium');	
},'pages.');
