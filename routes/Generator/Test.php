<?php
/**
 * test
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'test'], function () {
        Route::resource('tests', 'TestsController');
        //For Datatable
        Route::post('tests/get', 'TestsTableController')->name('tests.get');
    });
    
});