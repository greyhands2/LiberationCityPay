<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('/formSubmit', 'AuthController@register');
Route::post('/login', 'AuthLogController@login');
Route::get('/sendEmail','AuthLogController@sendEmail');

    Route::get('/givehere/{wildcard}', 'DirectToRightPageController@direct');

    Route::post('/UserPayDetailSubmit', 'RetrieveUserPaymentDetails@index');

    Route::any('givingLog', function(){
        return View::make('transaction_result');
    });

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

