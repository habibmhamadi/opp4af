<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OrganizationController;
use App\Http\Controllers\admin\OpportunityController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\FundController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\site\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/opportunities/{opp}', [HomeController::class, 'opportunity'])->name('opportunity');

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
        'user' => UserController::class,
    ]);

    Route::post('opportunity/publish/{opportunity}', [OpportunityController::class, 'publish'])->name('opportunity.publish');
    Route::post('opportunity/unpublish/{opportunity}', [OpportunityController::class, 'unPublish'])->name('opportunity.unpublish');

});


require __DIR__.'/auth.php';
