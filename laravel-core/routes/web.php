<?php

use App\Http\Controllers\AjaxHandlerController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\TyreController;
use App\Models\Brand;
use App\Models\Country;
use App\Models\Region;
use App\Models\SearchTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/testng/{country:id}',[TyreController::class, 'testing'])->where(['country'=>'[0-9]+'])->name('testing');


//Route::get('/mail',[MailController::class, 'genric_mail']);
session()->invalidate();

Route::get('/dashboard', function () {
    return view('ProductManager::admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/session/invalidate', function () {
    return session()->invalidate();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/location/update',[FormsController::class, 'location_form'])->name('location.update');
Route::post('/bubble-state/update',[FormsController::class, 'lb_state_update'])->name('location.bubblestate.update');


// Route::get('language/{locale}', function (string $locale) {
//     app()->setLocale($locale);
//     session()->put('locale', $locale);
//     return redirect()->back();
// });

require __DIR__.'/auth.php';
//require __DIR__.'/admin.php';
require __DIR__.'/staticpages.php';

require __DIR__.'/landingpages.php';
require __DIR__.'/form_routes.php';

//Normal Routes
//Route::get('/',[TyreController::class, 'tyre_grid'])->name('home');



//Locale routes
// Route::geo(function () {
//     Route::get('/',[TyreController::class, 'tyre_grid'])->name('home');
//     Route::get('/{brand:slug}', [TyreController::class, 'tyre_grid'])->where(['brand'=>'[a-zA-Z\-]{3,}'])->name('tyre.grid');
//     Route::get('/{brand:slug}/{tyre:slug}', [TyreController::class, 'tyre_single'])->where(['brand'=>'[a-zA-Z\-]{3,}','tyre'=>'[a-zA-Z0-9\-]{3,}'])->name('tyre.single');
// });







