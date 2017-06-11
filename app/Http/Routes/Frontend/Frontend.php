<?php

/**
 * Frontend Controllers
 */

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('macros', 'FrontendController@macros')->name('frontend.macros');
Route::get('getData', 'FrontendController@getData');
Route::get('getDataOut', 'FrontendController@getDataOut');

/**
 * These frontend controllers require the user to be logged in 
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('test', 'DashboardController@showTest')->name('frontend.user.testpage');
        
        // plan
        Route::get('store', 'InventoryController@showStore')->name('frontend.user.inventory.store');
        Route::post('save_inventory', 'InventoryController@store');
        Route::get('saveDetail/{id}', 'InventoryController@showSaveDetail')->name('frontend.user.inventory.saveDetail');
        Route::get('log', 'InventoryController@showlog')->name('frontend.user.inventory.log');

        Route::get('inventory', 'InventoryController@showInventory')->name('frontend.user.inventory.inventory');

    });
});

