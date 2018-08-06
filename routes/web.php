<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('/formSubmit', 'AuthController@register');
Route::post('/login', 'AuthLogController@login');
    
    
    Route::get('/givehere/{wildcard}', 'DirectToRightPageController@direct');
    
    Route::post('/savePaymentDetails', 'RetrieveUserPaymentDetails@index');
    
    //NOTE!!! for this to work i had to disable csrf token for this specicfic route in App/Http/Middleware/VerifyCsrfToken.php like this protected $except = [
    //
    //'givingLog',
   // ];
    Route::any('givingLog', function(){
        return View::make('transaction_result');
        
    });
    
//    Route::get('givingLogShow', function(){
//
//        return View::make('transaction_result');
//
//    });
    
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

