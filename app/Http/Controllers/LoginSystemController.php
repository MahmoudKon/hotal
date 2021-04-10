<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginSystemController extends Controller
{
    use AuthenticatesUsers;

    protected $guard, $redirect;

    public function __construct($guard, $redirect)
    {
        $this->guard    = $guard;
        $this->redirect = $redirect;
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        if (filter_var(request()->username, FILTER_VALIDATE_EMAIL))
            return 'email';

        if (is_numeric(request()->username))
            return 'phone';

        return 'username';
    } // End Check Field [ User Name || Phone || Email ]

    protected function guard()
    {
        return Auth::guard($this->guard);
    } // return the type of guard

    protected function redirectPath()
    {
        return $this->redirect;
    } // return redirect path
}
