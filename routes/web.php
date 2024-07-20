<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::name('dashboard.')->group( function(){
    Route::resource('admin', AdminController::class);
});
Route::prefix('LaravelExcel')->name('excel.')->controller(UserController::class)->group(function () {
    Route::get('/export-excel', 'export')->name('export');
    Route::get('/import-excel', 'importview')->name('importview');
    Route::post('/import-excel', 'import')->name('import');
});
