<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Members;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login_system/login');
    }

    public function register()
    {
        return view('login_system/register');
    }

   public function new_account()
    {
        $model = new Members();
        $YN=$model->save([
                'account'   =>  $this->request->getVar('account'),
                'password'  =>  $this->request->getVar('password')
        ]);
        echo $YN;
    }

    public function compare()
    {
        $member=
            [
                'account'   =>  $this->request->getVar('account'),
                'password'  =>  $this->request->getVar('password')
            ];
        print_r($member);
    }
}
