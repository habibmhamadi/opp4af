<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OrganizationController;
use App\Http\Controllers\admin\OpportunityController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\FundController;
use App\Http\Controllers\admin\AreaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resources([
        'opportunity' => OpportunityController::class,
        'category' => CategoryController::class,
        'location' => LocationController::class,
        'education' => EducationController::class,
        'organization' => OrganizationController::class,
        'fund' => FundController::class,
        'area' => AreaController::class,
    ]);

});


require __DIR__.'/auth.php';
