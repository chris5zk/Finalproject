<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function login_home()
    {
        return view('login_system/login_home');
    }
}
