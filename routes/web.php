<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/test', 'TestController@index');

Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'register', 'namespace' => 'Auth'], function () {
        Route::get('/aspirant', 'AspirantController@index');
        Route::post('/aspirant', 'AspirantController@store');
        Route::get('/company', 'CompanyController@index');
        Route::post('/company', 'CompanyController@store');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'HomeController@index');
        Route::resource('/aspirants', 'AspirantController');
        Route::resource('/companies', 'CompanyController');
        Route::delete('/resumes/{id}', 'ResumeController@destroy');
        Route::delete('/resumes/file/{id}', 'ResumeController@destroy');
        Route::delete('/jobs/{id}', 'JobController@destroy');
    });

    Route::group(['prefix' => 'aspirant', 'middleware' => 'role:aspirant', 'namespace' => 'Aspirant'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/applications', 'ApplicationController@index');
        Route::put('/applications/{id}', 'ApplicationController@update');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::resource('/resume', 'ResumeController', ['only' => ['index', 'store']]);
        Route::delete('/resume', 'ResumeController@destroy');
        Route::resource('/resume/file', 'ResumeFileController', ['only' => ['index', 'store']]);
        Route::delete('/resume/file', 'ResumeFileController@destroy');
        Route::get('/resume/download/{file}', 'ResumeFileController@download');
    });

    Route::group(['prefix' => 'company', 'middleware' => 'role:company', 'namespace' => 'Company'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::resource('/jobs', 'JobController');
        Route::get('/resumes/{file?}', 'ResumeController@index');
        Route::get('/aspirants', 'AspirantController@index');
        Route::get('/aspirants/{id}', 'AspirantController@show');
    });
});

Route::get('/', 'HomeController@index');
Route::get('/company/{slug}', 'CompanyController@show');
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/{slug}', 'JobController@show');

Auth::routes();
