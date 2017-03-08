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

Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'register', 'namespace' => 'Auth'], function () {
        Route::get('/aspirant', 'RegisterAspirantController@index');
        Route::post('/aspirant', 'RegisterAspirantController@store');
        Route::get('/company', 'RegisterCompanyController@index');
        Route::post('/company', 'RegisterCompanyController@store');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('/', 'HomeController@index');
        Route::resource('/applications', 'ApplicationController');
        Route::resource('/aspirants', 'AspirantController');
        Route::resource('/companies', 'CompanyController');
        Route::resource('/resumes', 'ResumeController');
        Route::resource('/users', 'UserController');
        Route::resource('/vacancies', 'VacancyController');
    });

    Route::group(['prefix' => 'aspirant', 'middleware' => 'aspirant', 'namespace' => 'Aspirant'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/applications', 'ApplicationController@index');
        Route::put('/applications/{id}', 'ApplicationController@edit');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::get('/resume', 'ResumeController@index');
        Route::post('/resume', 'ResumeController@update');
    });

    Route::group(['prefix' => 'company', 'middleware' => 'company', 'namespace' => 'Company'], function () {
        Route::get('/', 'HomeController@index');
        Route::get('/profile', 'ProfileController@edit');
        Route::put('/profile', 'ProfileController@update');
        Route::resource('/vacancies', 'VacancyController');
    });
});

Route::get('/', 'HomeController@index');
Route::get('/company/{slug}', 'CompanyController@show');
Route::get('/vacancies', 'VacancyController@index');
Route::get('/vacancies/{slug}', 'VacancyController@show');

Auth::routes();
