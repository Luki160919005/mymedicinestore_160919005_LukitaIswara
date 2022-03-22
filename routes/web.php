<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicineController;
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

//Route::get('formnewproduct','ProductController@create');

//Route::get('formupdateproduct','ProductController@update');

//Route::resource('product','ProductResController');

Route::resource('medic',MedicineController::class);
Route::resource('category',CategoryController::class);
//Route::resource('Cate','CategoryController');
Route::get('/join', '\App\Http\Controllers\MedicineController@joinTable');

Route::get('/checkImages', '\App\Http\Controllers\MedicineController@checkImages');

Route::get('/check', '\App\Http\Controllers\MedicineController@test');

Route::get('/aggro', '\App\Http\Controllers\MedicineController@aggregation');
//Route::resource('cate', '\App\Http\Controllers\CategoryController@index');
//Route::resource('cate', [CategoryController::class, 'index']);
Route::get('/test', '\App\Http\Controllers\MedicineController@test');

Route::get('report/lustmedicine/{id}','\App\Http\Controllers\CategoryController@aggregation');
