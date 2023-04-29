<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\DefaultController;


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

     return view('auth/login');

});



//Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');


});


//Stock All Route
Route::controller(StockController::class)->group(function(){
    Route::get('/stock/report', 'StockReport')->name('stock.report');
    Route::get('/stock/add', 'StockAdd')->name('stock.add');
    Route::post('/stock/store', 'StockStore')->name('stock.store');
    Route::get('/stock/edit/{id}', 'StockEdit')->name('stock.edit'); 
    Route::post('/stock/update', 'StockUpdate')->name('stock.update');
    Route::get('/stock/delete/{id}', 'StockDelete')->name('stock.delete');


});

//Purchase All Route
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all'); 
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
    Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');


});

//Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-price', 'GetPrice')->name('get-price'); 
    Route::get('/get-dosage', 'GetDosage')->name('get-dosage'); 
    Route::get('/get-type', 'GetType')->name('get-type'); 

   

});







Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
