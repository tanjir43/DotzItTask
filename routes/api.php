<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','Blade'
   
])
->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/product','ProductController@index')->name('product');
    Route::post('/product-save','ProductController@save')->name('product.save');
    
    Route::get('/my-product','MyProductController@index')->name('my.product');
    Route::post('/my-product-save','MyProductController@save')->name('my.product.save');
    //Route::get('autocomplete', 'MyProductController@autocomplete')->name('autocomplete');
});
