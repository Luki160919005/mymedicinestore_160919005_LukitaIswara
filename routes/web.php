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

Auth::routes();
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/checkout','\App\Http\Controllers\TransactionController@form_submit_front')->middleware('auth');
Route::get('/submit_checkout','\App\Http\Controllers\TransactionController@submit_front')
->name('submitcheckout')->middleware('auth');


Route::get('/','\App\Http\Controllers\ProductController@front_index');
Route::get('cart','\App\Http\Controllers\ProductController@cart');
Route::get('add-to-cart/{id}','\App\Http\Controllers\ProductController@addToCart');
Route::get('transactionDetail/{id}','\App\Http\Controllers\ProductController@transactionDetail');


Route::get('/home','\App\Http\Controllers\HomeController@index')->name('home');

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
 

Route::middleware(['auth'])->group(function(){

    Route::post('/category/getEditForm','\App\Http\Controllers\CategoriesController@getEditForm')
    ->name('category.getEditForm');

    Route::post('/category/getEditForm2','\App\Http\Controllers\CategoriesController@getEditForm2')
    ->name('category.getEditForm2');

    Route::post('/category/saveData','\App\Http\Controllers\CategoriesController@saveData')
    ->name('category.saveData');

    Route::get('/category/{id}/edit','\App\Http\Controllers\CategoriesController@categoriesCreate')
    ->name('category.edit');




    Route::get('categoriesCreate','\App\Http\Controllers\CategoriesController@categoriesCreate');

    Route::get('/categoriesEdit/{id}','\App\Http\Controllers\CategoriesController@editCategories');

    Route::post('/category/deleteData','\App\Http\Controllers\CategoriesController@deleteData')
    ->name('category.deleteData');
});




Route::middleware(['auth'])->group(function(){

    Route::resource('products',ProductController::class);
    Route::post('/products/getEditForm','\App\Http\Controllers\ProductController@getEditForm')
    ->name('products.getEditForm');

    Route::post('/products/getEditForm2','\App\Http\Controllers\ProductController@getEditForm2')
    ->name('products.getEditForm2');

    Route::post('/products/saveData','\App\Http\Controllers\ProductController@saveData')
    ->name('products.saveData');

    Route::post('/products/deleteData','\App\Http\Controllers\ProductController@deleteData')
    ->name('products.deleteData');

    Route::post('/products/saveDataField','\App\Http\Controllers\ProductController@saveDataField')
    ->name('products.saveDataField');

    Route::post('/products/ChangeLogo','\App\Http\Controllers\ProductController@changeLogo')
    ->name('products.changeLogo');
});


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

    Route::post('/supplier/saveDataField','\App\Http\Controllers\SupplierController@saveDataField')
    ->name('supplier.saveDataField');

    Route::post('/supplier/ChangeLogo','\App\Http\Controllers\SupplierController@changeLogo')
    ->name('suppliers.changeLogo');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

