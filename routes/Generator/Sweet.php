<?php
/**
 * sweet
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'sweet'], function () {
        Route::resource('sweets', 'SweetsController');
        //For Datatable
        Route::post('sweets/get', 'SweetsTableController')->name('sweets.get');
    });
    
});