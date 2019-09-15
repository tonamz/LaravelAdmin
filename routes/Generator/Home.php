<?php
/**
 * home
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'home'], function () {
        Route::resource('homes', 'HomesController');
        //For Datatable
        Route::post('homes/get', 'HomesTableController')->name('homes.get');
    });
    
});