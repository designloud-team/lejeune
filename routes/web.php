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
Route::get('order', 'PublicController@getpage');
Route::post('order', ['uses'=> 'OrderController@store']);
Route::get('notary-registration','PublicController@getpage');
Route::get('contact', 'PublicController@getpage');
Route::get('notaries/{id}/verify', 'PublicController@verify');
Route::get('signin', 'PublicController@getpage');

Route::group( ['prefix' => 'search'], function() {
    Route::get( '/notary', function() {
        return redirect()->to('/notary-registration');
    });
    Route::post( '/notary', ['as'=>'search.notary', 'uses'=>'SearchController@findNotaryByEmail'] );
    Route::post( 'notary/save', ['as'=>'notaries.save', 'uses'=>'PublicController@saveNotary'] );

//        Route::post( '/customer', ['as'=>'search.customer', 'uses'=>'SearchController@create'] );
//        Route::post( '/job', ['as'=>'search.job', 'uses'=>'SearchController@store'] );
//        Route::post( '/report', ['as'=>'search.report', 'uses'=>'SearchController@show'] );
});

Route::post( '/sign-in', ['as'=>'notary.login', 'uses'=>'PublicController@findNotaryByLast'] );

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
        Route::get( '/data/{type}', ['as'=>'customers.data', 'uses'=>'CustomerController@getDatatablesData'] );
//        Route::get( '/data/{delete}', ['as'=>'customers.destroy-all', 'uses'=>'CustomerController@getDatatablesData'] );

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
            Route::get( '/data/{type}', ['as'=>'notaries.data', 'uses'=>'NotaryController@getDatatablesData'] );
//            Route::get( '/data/{delete}', ['as'=>'notaries.destroy-all', 'uses'=>'NotaryController@getDatatablesData'] );
    });
    Route::group( ['prefix' => 'orders'], function() {
        Route::get( '/', ['as'=>'orders.index', 'uses'=>'OrderController@index'] );
        Route::get( '/{id}', ['as'=>'orders.show', 'uses'=>'OrderController@show'] );
        Route::get( '/{id}/edit', ['as'=>'orders.edit', 'uses'=>'OrderController@edit'] );
        Route::patch( '/{id}', ['as'=>'orders.update', 'uses'=>'OrderController@update'] );
        Route::delete( '/{id}', ['as'=>'orders.destroy', 'uses'=>'OrderController@destroy'] );
        Route::post( '/destroy-all', ['as'=>'orders.destroy-all', 'uses'=>'OrderController@destroyAll'] );
        Route::get( '/downloadExcel/{type}', ['as'=>'orders.downloadExcel', 'uses'=>'OrderController@downloadExcel'] );
        Route::post( '/importExcel', ['as'=>'orders.importExcel', 'uses'=>'OrderController@importExcel'] );
        Route::get( '/data/{type}', ['as'=>'orders.data', 'uses'=>'OrderController@getDatatablesData'] );
        Route::get('/{id}/pdf', ['as'=>'order.pdf','uses'=> 'OrderController@pdf']);
    });




});

Auth::routes();