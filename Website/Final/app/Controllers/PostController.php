<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function postpage()
    {
        return view('post_system/postpage');
    }
}
