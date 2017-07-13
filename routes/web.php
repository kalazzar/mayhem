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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// plan
Route::get('store', 'InventoryController@showStore')->name('store');
Route::post('save_inventory', 'InventoryController@store');
Route::get('saveDetail/{id}', 'InventoryController@showSaveDetail')->name('saveDetail');
Route::get('log', 'InventoryController@showlog')->name('log');

Route::get('inventory', 'InventoryController@showInventory')->name('inventory');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

