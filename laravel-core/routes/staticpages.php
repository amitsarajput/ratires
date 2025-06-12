<?php
use App\Http\Controllers\ClimateNewsController;
use App\Http\Controllers\GolfTournamentController;
use App\Http\Controllers\MotorsportController;
use App\Http\Controllers\StaticPagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//use App\Models\GolfTournament;
//use App\Http\Controllers\GolfTournamentController;
//use App\Http\Controllers\MotorsportController;
//use App\Http\Controllers\ClimateNewsController;
//use App\Http\Controllers\MediaController;

//use App\Http\Controllers\LocationController;
//use App\Http\Controllers\BrandController;

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


Route::geo(function(){
	Route::get('/about-us', [StaticPagesController::class,'index'])->name('about-us');
	Route::get('/why-radar', [StaticPagesController::class,'index'])->name('why-radar');
	Route::get('/dealer-locator', [StaticPagesController::class,'index'])->name('dealer-locator');
	//Contact Page
	Route::get('/contact-us', [StaticPagesController::class, 'index'])->name('contact');
	Route::get('/warranty', [StaticPagesController::class,'index'])->name('warranty');
	Route::get('/premium-collection', [StaticPagesController::class,'index'])->name('premium-collection');
	Route::get('/ceo-message', [StaticPagesController::class,'index'])->name('ceo-message');
	Route::get('/testing', [StaticPagesController::class,'index'])->name('testing');
	Route::get('/privacy-policy', [StaticPagesController::class,'index'])->name('privacy-policy');
	Route::get('/red-partner', [StaticPagesController::class,'index'])->name('red-partner');
	Route::get('/red', [StaticPagesController::class,'index'])->name('red');
	Route::get('/new-european-tyre-labeling', [StaticPagesController::class,'index'])->name('eu-labeling');

	
	Route::get('/real-people-group', [StaticPagesController::class,'index'])->name('real-people');
	Route::get('/olli-seppala', [StaticPagesController::class,'index'])->name('olli-seppala');
	Route::get('/stephane-clepkens', [StaticPagesController::class,'index'])->name('stephane-clepkens');
	Route::get('/fabrizio-giugiaro', [StaticPagesController::class,'index'])->name('fabrizio-giugiaro');
	
},'pages.');

//Routes without country.
Route::name('pages.')->group(function(){
	Route::get('/environmental-responsibility', [StaticPagesController::class,'index'])->name('responsibility-environment');
	Route::get('/social-responsibility', [StaticPagesController::class,'index'])->name('responsibility-social');
});

