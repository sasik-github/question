<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index');

//    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::group(['middleware' => 'timelock'], function(){
        Route::post('/home', 'HomeController@login');

        Route::get('/question', 'QuestionController@index');
        Route::get('/question/all', 'QuestionController@getAllQuestions');
        Route::post('/question/success', 'QuestionController@success');
        Route::get('/question/success', 'QuestionController@success');

    });

    Route::group(['middleware' => \App\Http\Middleware\LockDownloadCert::class], function() {
        Route::get('/question/download', 'QuestionController@downloadCertificate');
    });


});
