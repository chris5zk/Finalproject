<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function homepage()
    {
        return view('post_system/homepage');
    }

    public function postpage()
    {
        if(session()->get('Login')==false):
            echo '<script>alert("請先登入！！")</script>';
            return view('login_system/login');
        endif;
        return view('post_system/postpage');
        $image = \Config\Services::image();
    }

    public function new_picture()
    {
    //$model = new Members();
    //$YN=$model->save([
    //        'progressbarTW_img'   =>  $this->request->getVar('progressbarTW_img')
    //]);
    //echo $YN;
    }

}
