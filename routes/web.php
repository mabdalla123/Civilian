<?php

use App\Http\Controllers\AcceptancesController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\RealEstateController;
use App\Http\Controllers\RealEstateTypeController;
use App\Models\RealEstateFile;
use App\Models\RealEstateType;
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

Route::get('/',[HomeController::class,'index'])->name('Home');



Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    Route::prefix('admin')->group(function () {
        
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
        Route::resource('/cities',CityController::class);
    
        Route::resource('/Acceptances',AcceptancesController::class);

        Route::resource('/realestatetypes',RealEstateTypeController::class);

        Route::resource('/realestate',RealEstateController::class);

        Route::delete('/realestatefile/{realEstateFile}',[RealEstateFile::class,'destroy'])->name('realestatefile.destroy');

    });

});


