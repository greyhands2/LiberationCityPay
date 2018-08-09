<?php


Route::get('/', function () {
    return view('welcome');
});
Route::post('/formSubmit', 'AuthController@register');
Route::get('/logout', 'Auth\LoginController@logout');


    Route::get('/logs','HomeController@transactionLogs')->middleware('auth');
    Route::get('/requery/{id}','HomeController@requery')->middleware('auth');
    Route::get('/members','HomeController@members')->middleware('auth');

Route::get('/givehere/{wildcard}', 'DirectToRightPageController@direct');
Route::post('/savePaymentDetails', 'RetrieveUserPaymentDetails@index');
Route::post('givingLog','HomeController@paymentConfirmation');
Route::get('payment-confirmation','HomeController@paymentConfirmationPage');


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

