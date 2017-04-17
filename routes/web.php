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
        Route::delete('/resume/{id}', 'ResumeController@destroy');
        Route::resource('/jobs', 'JobController');
    });

    Route::group(['prefix' => 'aspirant', 'middleware' => 'role:aspirant', 'namespace' => 'Aspirant'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/applications', 'ApplicationController@index');
        Route::put('/applications/{id}', 'ApplicationController@update');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::get('/resume', 'ResumeController@index');
        Route::post('/resume', 'ResumeController@store');
        Route::post('/resume/file', 'ResumeFileController@store');
        Route::delete('/resume/file', 'ResumeFileController@destroy');
        Route::get('/resume/download/{file}', 'ResumeFileController@download');
    });

    Route::group(['prefix' => 'company', 'middleware' => 'role:company', 'namespace' => 'Company'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::resource('/jobs', 'JobController');
        Route::get('/jobs/{job_id}/aspirant/{aspirant_id}', 'ResumeController@index');
    });
});

Route::get('/', 'HomeController@index');
Route::get('/company/{slug}', 'CompanyController@show');
Route::get('/jobs', 'JobController@index');
Route::get('/jobs/{slug}', 'JobController@show');

Auth::routes();
