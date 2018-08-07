<?php


Route::get('/', function () {
    return view('welcome');
});
Route::post('/formSubmit', 'AuthController@register');
Route::get('/logout', 'Auth\LoginController@logout');


    Route::get('/logs','HomeController@transactionLogs')->middleware('auth');
    Route::get('/requery','HomeController@index')->middleware('auth');
    Route::get('/members','HomeController@members')->middleware('auth');

Route::get('/givehere/{wildcard}', 'DirectToRightPageController@direct');
Route::post('/savePaymentDetails', 'RetrieveUserPaymentDetails@index');
Route::any('givingLog', function(){
    return View::make('transaction_result');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

