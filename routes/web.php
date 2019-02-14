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

Route::get('/','PublicController@getpage');
Route::get('about', 'PublicController@getpage');
Route::get('services', 'PublicController@getpage');
Route::get('orders', 'PublicController@getpage');
Route::post('orders', ['uses'=> 'OrderController@store']);
Route::get('orders/{id}/pdf', ['as'=>'order.pdf','uses'=> 'OrderController@pdf']);
Route::get('notary-registration','PublicController@getpage');
Route::get('contact', 'PublicController@getpage');
//
Route::group(array('middleware'=> 'auth'), function (){
    Route::get('dashboard', ['as'=>'dashboard.index','uses'=>'HomeController@index']);

    Route::get('customers-dashboard', ['as'=>'dashboard.index','uses'=>'CustomerController@getDashboard']);
    Route::get('notaries-dashboard', ['as'=>'dashboard.index','uses'=>'NotaryController@getDashboard']);
    Route::get('jobs-dashboard', ['as'=>'dashboard.index','uses'=>'JobController@getDashboard']);
    Route::get('invoices-dashboard', ['as'=>'dashboard.index','uses'=>'InvoiceController@getDashboard']);


    Route::resource('jobs', 'JobController');
    Route::resource('invoices', 'InvoiceController');

    Route::group( ['prefix' => 'customers'], function() {
        Route::get( '/', ['as'=>'customers.index', 'uses'=>'CustomerController@index'] );
        Route::get( '/create', ['as'=>'customers.create', 'uses'=>'CustomerController@create'] );
        Route::post( '/create', ['as'=>'customers.store', 'uses'=>'CustomerController@store'] );
        Route::get( '/{id}', ['as'=>'customers.show', 'uses'=>'CustomerController@show'] );
        Route::get( '/{id}/edit', ['as'=>'customers.edit', 'uses'=>'CustomerController@edit'] );
        Route::patch( '/{id}', ['as'=>'customers.update', 'uses'=>'CustomerController@update'] );
        Route::delete( '/{id}', ['as'=>'customers.destroy', 'uses'=>'CustomerController@destroy'] );
//        Route::post( '/update-tags', ['as'=>'customers.update-tags', 'uses'=>'CustomerController@updateTags'] );
        Route::post( '/destroy-all', ['as'=>'customers.destroy-all', 'uses'=>'CustomerController@destroyAll'] );
        Route::get( '/downloadExcel/{type}', ['as'=>'customers.downloadExcel', 'uses'=>'CustomerController@downloadExcel'] );
        Route::post( '/importExcel', ['as'=>'customers.importExcel', 'uses'=>'CustomerController@importExcel'] );
        Route::get( '/data/{id}/{type}', ['as'=>'customers.data', 'uses'=>'CustomerController@getDatatablesData'] );
    });

    Route::group( ['prefix' => 'notaries'], function() {
            Route::get( '/', ['as'=>'notaries.index', 'uses'=>'NotaryController@index'] );
            Route::get( '/create', ['as'=>'notaries.create', 'uses'=>'NotaryController@create'] );
            Route::post( '/create', ['as'=>'notaries.store', 'uses'=>'NotaryController@store'] );
            Route::get( '/{id}', ['as'=>'notaries.show', 'uses'=>'NotaryController@show'] );
            Route::get( '/{id}/edit', ['as'=>'notaries.edit', 'uses'=>'NotaryController@edit'] );
            Route::patch( '/{id}', ['as'=>'notaries.update', 'uses'=>'NotaryController@update'] );
            Route::delete( '/{id}', ['as'=>'notaries.destroy', 'uses'=>'NotaryController@destroy'] );
//        Route::post( '/update-tags', ['as'=>'notaries.update-tags', 'uses'=>'NotaryController@updateTags'] );
            Route::post( '/destroy-all', ['as'=>'notaries.destroy-all', 'uses'=>'NotaryController@destroyAll'] );
            Route::get( '/downloadExcel/{type}', ['as'=>'notaries.downloadExcel', 'uses'=>'NotaryController@downloadExcel'] );
            Route::post( '/importExcel', ['as'=>'notaries.importExcel', 'uses'=>'NotaryController@importExcel'] );
            Route::group( ['prefix' => 'datatables'], function() {
                Route::get( '/data/{id}/{type}', ['as'=>'notaries.data', 'uses'=>'NotaryController@getCustomerJsonData'] );
            });
    });

});

Auth::routes();