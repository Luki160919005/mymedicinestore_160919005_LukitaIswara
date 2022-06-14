<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

//Route::get('formnewproduct','ProductController@create');

//Route::get('formupdateproduct','ProductController@update');

//Route::resource('product','ProductResController');

Route::post('/medicines/showInfo','\App\Http\Controllers\MedicineController@showInfo')->name('medicines.showInfo');

Route::resource('medicines',MedicineController::class);
Route::resource('category',CategoryController::class)->middleware('auth');
Route::resource('transaction',TransactionController::class);
//Route::resource('Cate','CategoryController');
Route::get('/join', '\App\Http\Controllers\MedicineController@joinTable');

Route::get('/checkMed', '\App\Http\Controllers\MedicineController@CheckMed');

Route::get('/checkImages', '\App\Http\Controllers\MedicineController@checkImages');

Route::get('/show/{$medicine}', '\App\Http\Controllers\MedicineController@show');

Route::get('/check', '\App\Http\Controllers\MedicineController@test');

Route::get('/aggro', '\App\Http\Controllers\MedicineController@aggregation');
//Route::resource('cate', '\App\Http\Controllers\CategoryController@index');
//Route::resource('cate', [CategoryController::class, 'index']);
Route::get('/test', '\App\Http\Controllers\MedicineController@test');

Route::post('transaction/showDataAjax','\App\Http\Controllers\TransactionController@showAjax')->name('transaction.showAjax');


Route::get('transaction/showDataAjax2/{id}','\App\Http\Controllers\TransactionController@showAjax2')
    ->name('transaction.showAjax2');

Route::get('/showDataAjax3/{id}','\App\Http\Controllers\TransactionController@showAjax3')->name('transaction.showAjax3');;
 
   


Route::resource('products',ProductController::class);


Route::middleware(['auth'])->group(function(){

    Route::resource('suppliers',SupplierController::class);
    Route::post('/supplier/getEditForm','\App\Http\Controllers\SupplierController@getEditForm')
    ->name('supplier.getEditForm');

    Route::post('/supplier/getEditForm2','\App\Http\Controllers\SupplierController@getEditForm2')
    ->name('supplier.getEditForm2');

    Route::post('/supplier/saveData','\App\Http\Controllers\SupplierController@saveData')
    ->name('supplier.saveData');

    Route::post('/supplier/deleteData','\App\Http\Controllers\SupplierController@deleteData')
    ->name('supplier.deleteData');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
