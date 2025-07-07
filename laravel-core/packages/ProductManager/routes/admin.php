<?php

use ProductManager\Http\Controllers\AjaxHandlerController;
use ProductManager\Http\Controllers\BrandController;
use ProductManager\Http\Controllers\BrandExtraDetailController;
use ProductManager\Http\Controllers\CountryController;
use ProductManager\Http\Controllers\DealerController;
use ProductManager\Http\Controllers\IconController;
use ProductManager\Http\Controllers\RegionController;
use ProductManager\Http\Controllers\SearchTagController;
use ProductManager\Http\Controllers\SeasonController;
use ProductManager\Http\Controllers\TyreCategoryController;
use ProductManager\Http\Controllers\TyreController;

use App\Http\Controllers\FormsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware([ 'web', 'auth', 'verified' ])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('rgn', RegionController::class);
    Route::resource('countri', CountryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('searchtag', SearchTagController::class);
    Route::resource('icon', IconController::class);
    Route::match(['GET','POST','PUT'], 'tyre-feature/{tyre}', [TyreController::class,'feature'])->name('tyre.feature');
    Route::match(['GET','POST','PUT'], 'tyre-size/{tyre}', [TyreController::class,'size'])->name('tyre.size');
    Route::match(['GET','POST','PUT'], 'tyre-clone/{tyre}', [TyreController::class,'clone'])->name('tyre.clone');
    Route::match(['GET','PUT'], 'tyre-publish/{tyre}', [TyreController::class,'publish'])->name('tyre.publish');
    Route::match(['GET','POST','PUT'], 'tyre-reorder/', [TyreController::class,'tyrereorder'])->name('tyre.reorder');
    Route::resource('tyre', TyreController::class);
    Route::resource('tyrecategory', TyreCategoryController::class);
    Route::resource('brandextradetail', BrandExtraDetailController::class);
    Route::resource('season', SeasonController::class);
    Route::resource('dealer', DealerController::class);
    Route::resource('forms', FormsController::class);
    Route::match(['GET','POST','PUT'], 'dealer-bulk-export', [DealerController::class,'bulkexport'])->name('dealer.bulkexport');
    Route::match(['GET','POST','PUT'], 'dealer-bulk-add', [DealerController::class,'bulkadd'])->name('dealer.bulkadd');
    // Ajax request
    Route::post('/ajax-request/{table}',[AjaxHandlerController::class, 'handle_request'])->name('ajax.request');
});