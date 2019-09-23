<?php

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

Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'kriteria'], function () {
        Route::get('/', "KriteriaController@index")->name("kriteria.index");
        Route::post('/', "KriteriaController@store")->name("kriteria.store");
        Route::get('/{key}', "KriteriaController@show")->name("kriteria.show");
        Route::put('/{key}', "KriteriaController@update")->name("kriteria.update");
        Route::delete('/{key}', "KriteriaController@destroy")->name("kriteria.destroy");
    });


});

// Route::group(['prefix' => 'admin'], function () {
    
// });