<?php

use App\Http\Middleware\Banned;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([ 'prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] ], function(){
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {

        // Login Routes
        Route::get('login', 'LoginController@showLoginForm')->name('showLoginForm');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        // .\ END

        Route::group(['middleware' => ['auth:employee', Banned::class]], function () {
            Route::view('/', 'dashboard.dashboard')->name('/');

            Route::resource('employees', 'EmployeesController');
            Route::post('employees/{employee}/banned', 'EmployeesController@banned')->name('employees.banned');
            Route::post('employees/permissions', 'EmployeesController@permissions')->name('employees.permissions');

            Route::resource('users', 'UsersController');
            Route::post('users/{user}/banned', 'UsersController@banned')->name('users.banned');
        }); // end of grouping the auth of middleware

        // // This For Banned Employees
        Route::get('banned', function () { return view('banned'); })->name('banned')->middleware('auth:employee');
    }); // end of grouping the prefix and as
}); // end of grouping the lcalization middleware
