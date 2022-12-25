<?php

use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\UserCtrl;
use App\Http\Middleware\checkadmin;
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

Route::get('/', function () {
    return view(('admin.dashboard'));
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware([checkadmin::class])->group(
        function () {
            Route::get('/', [AdminCtrl::class, 'dashboard'])->name('dashboard');
            Route::resources(
                ['user'=>UserCtrl::class,
                ],

            );
    }
    );
    // Route::get('dashboard', [AdminCtrl::class, 'dashboard'])->name('dashboard'); 
    Route::get('login', [AdminCtrl::class, 'login'])-> name('login');
    Route::post('login',[AdminCtrl::class,'postlogin']) -> name('postlogin');
    Route::get('logout',[AdminCtrl::class,'logout']) -> name('logout');

});