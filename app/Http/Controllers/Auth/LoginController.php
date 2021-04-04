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
        // dd('ds');
        parent::__construct($this->guard, $this->redirect);
    }
}
