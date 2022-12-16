<?php

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

Route::get('/cs', function () {
    return view('contact');
});

Route::get('/insertProduct',[
    'uses'=>'ProductController@create',
    'as'=>'product'
]);


Route::get('/insertCategory',[
    'uses'=>'CategoryController@create', 
    //uses will call the controller on create function
    'as'=>'category'
    // as is using on view 
]);

Route::post('/addCategory/store',[  // define your self
    'uses'=>'CategoryController@store',
    'as'=>'addCategory.store'    // check the charactor when you copy paste from PPT
]);

Route::post('/addProduct/store',[  // define your self
    'uses'=>'ProductController@store',
    'as'=>'addProduct.store'    // check the charactor when you copy paste from PPT
]);

Route::get('/allproduct',[
    'uses'=>'ProductController@show', 
    'as'=>'all.product'
]);

Route::get('/allproduct/delete/{id}',[
    'uses'=>'ProductController@delete', 
    'as'=>'delete.product'
]);

Route::get('/editproduct/{id}',[
    'uses'=>'ProductController@edit', 
    'as'=>'edit.product'
]);

Route::post('updateproduct', [
    'uses'=>'ProductController@update',
    'as' => 'update.product'
]);

Route::post('searchproduct', [
    'uses'=>'ProductController@search',
    'as' => 'search.product'
]);

Route::get('/products',[
    'uses'=>'productShow@showProducts', 
    'as'=>'products'
]);

Route::get('/products/{id}',[
    'uses'=>'productShow@showProductDetail', 
    'as'=>'product.detail'
]);

Route::post('/addToCart',[
    'uses'=>'CartController@add',
    'as'=>'add.to.cart'
]);

Route::get('/myCart',[
    'uses'=>'CartController@show', 
    'as'=>'my.cart'
]);

Route::get('/myCart/delete/{id}',[
    'uses'=>'CartController@delete', 
    'as'=>'delete.cart'
]);

Route::post('/createorder',[
    'uses'=>'OrderController@add',
    'as'=>'create.order'
]);

Route::get('/myorder',[
    'uses'=>'OrderController@show',
    'as'=>'my.order'
]);


// route for processing payment
Route::post('paypal', 'PaymentController@payWithpaypal');

// route for check status of the payment
Route::get('status', 'PaymentController@getPaymentStatus');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

