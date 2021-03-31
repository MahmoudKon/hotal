<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\LoginSystemController;
use App\Providers\RouteServiceProvider;

class LoginController extends LoginSystemController
{
    protected $guard    = 'employee';
    protected $redirect = RouteServiceProvider::DASHBOARD;

    public function __construct()
    {
        parent::__construct($this->guard, $this->redirect);
    }

    public function showLoginForm()
    {
        return view('dashboard.login.login');
    } // End View Login Form
}
