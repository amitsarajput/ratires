<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;


Route::prefix('{country:slug}')->where(['country'=>'[a-zA-Z]{2,3}'])->name('pages.')->group(function(){
	//Route::get('/radar/eu-renegade-x', [StaticPagesController::class,'landingpage'])->name('renegade-x');	
});
