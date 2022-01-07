<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function postpage()
    {
        return view('post_system/postpage');
        $image = \Config\Services::image();
    }
<<<<<<< HEAD
   
=======
    public function new_picture()
    {
    $model = new Members();
    $YN=$model->save([
            'progressbarTW_img'   =>  $this->request->getVar('progressbarTW_img')
    ]);
    echo $YN;
    }
>>>>>>> boyu
}
