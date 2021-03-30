<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([ 'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

        Route::get('/', function () {
            return view('dashboard.dashboard');
        });

        Route::resource('employees', 'EmployeesController');

    });

}); // end group of lcalization middleware
