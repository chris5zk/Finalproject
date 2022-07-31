<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Post;
use ArrayObject;

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
    }

    public function search()
    {
        return view('post_system/search');
    }

    public function post()
    {
        if(session()->get('Login')==false):
            echo '<script>alert("請先登入！！")</script>';
            return view('login_system/login');
        endif;

        helper(['form','url']);

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'date'      =>  'required',
                'car'       =>  'required|max_length[10]',
                'place'     =>  'required|max_length[50]',
                'contact'   =>  'required|max_length[100]',
                'content'   =>  'max_length[500]'
            ];
            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            }
            else{
                if($_FILES['myfile']['error'] > 0 ) {
                    switch ($_FILES['myfile']['error'] ) {
                        case 1:die("檔案大小超出 php.ini:upload_max_filesize 限制 ");
                        case 2:die("檔案大小超出 MAX_FILE_SIZE 限制");
                        case 3:die("檔案大小僅被部份上傳");
                    }
                }
                if(is_uploaded_file($_FILES['myfile']['tmp_name'])){	
                    $DestDIR = "upload";
                    if(!is_dir($DestDIR) || !is_writable($DestDIR)){
                        die("目錄不存在或無法存取檔案");
                    }
        
                    $File_Extension = explode(".", $_FILES['myfile']['name']);
                    $File_Extension = $File_Extension[count($File_Extension)-1];
                    $ServerFilename = date("YmdHis").".".$File_Extension;
                    move_uploaded_file($_FILES['myfile']['tmp_name'], $DestDIR.'/'.$ServerFilename);
                    $model = new Post();
                    $post=[
                        'date'      =>  $this->request->getVar('date'),
                        'car'       =>  $this->request->getVar('car'),
                        'place'     =>  $this->request->getVar('place'),
                        'contact'   =>  $this->request->getVar('contact'),
                        'content'   =>  $this->request->getVar('content'),
                        'myfile'    =>  $ServerFilename,
                        'file_name' =>  $_FILES['myfile']['name']
                    ];
                    $model->save($post);
                    echo '<script>alert("發文成功！！！")</script>';
                    return view('post_system/homepage');
                }
            }
        }
        return view('post_system/postpage',$data);
    }

    public function found()
    {
        $model = new Post();
        $posts = $model->findAll();
        $data = [
            'posts' => []
        ];
        foreach($posts as $post)
            if($post['car'] == $_POST['car'])
                array_push($data['posts'],$post);
        return view('post_system/search',$data);
    }

    public function show($post_id)
    {
        $model = new Post();
        $data = [
            'post'  =>  $model->find($post_id)
        ];
        return view('post_system/show',$data);
    }
}