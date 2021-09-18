<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OpportunityController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\FundController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\admin\SubscriberController;

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
Route::get('/opportunities', [HomeController::class, 'opportunities'])->name('opportunities');
Route::get('/opportunity/{opportunity:slug}', [HomeController::class, 'opportunity'])->name('opportunity');
Route::view('/about', 'site.about')->name('about');
Route::view('/privacy-policy', 'site.policy' )->name('policy');
Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.dashboard')->name('dashboard');

    Route::resources([
        'opportunity' => OpportunityController::class,
        'category' => CategoryController::class,
        'location' => LocationController::class,
        'education' => EducationController::class,
        'fund' => FundController::class,
        'area' => AreaController::class,
        'user' => UserController::class,
    ]);

    Route::post('opportunity/publish/{opportunity}', [OpportunityController::class, 'publish'])->name('opportunity.publish');
    Route::post('opportunity/unpublish/{opportunity}', [OpportunityController::class, 'unPublish'])->name('opportunity.unpublish');
    Route::get('subscriber', [SubscriberController::class, 'index'])->name('subscriber.index');
});


require __DIR__.'/auth.php';
