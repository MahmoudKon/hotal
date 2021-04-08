<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\LoginSystemController;
use App\Providers\RouteServiceProvider;

class LoginController extends LoginSystemController
{
    protected $guard    = 'web';
    protected $redirect = RouteServiceProvider::HOME;

    public function __construct()
    {
        parent::__construct($this->guard, $this->redirect);
    }
}
