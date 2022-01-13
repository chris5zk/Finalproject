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
        helper(['form','url']);
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name'      =>  'required|max_length[20]',
                'mail'      =>  'required|valid_email',
                'account'   =>  'required|min_length[8]|max_length[20]',
                'password'  =>  'required|min_length[8]|max_length[20]',
                'passconf'  =>  'required|matches[password]'
            ];
            if ($this->validate($rules)) {
                if( $_POST['password'] != $_POST['passconf'] ){
                    echo '<script>alert("兩組密碼不一，請重新輸入！")</script>';
                    return view('login_system/register');
                }

                $model = new Members();
                $members = $model->findAll();

                for($i=0;isset($members[$i]);$i++){

                    $mail = strcmp($_POST['mail'],$members[$i]['mail']);
                    $account = strcmp($_POST['account'],$members[$i]['account']);
                    $name = strcmp($_POST['name'],$members[$i]['name']);
                    
                    if($mail==0){
                        echo '<script>alert("此電子郵件已被註冊過！")</script>';
                        return view('login_system/register');
                    }
                    else if($account==0){
                        echo '<script>alert("此帳號已有人，換個帳號吧！")</script>';
                        return view('login_system/register');
                    }
                    else if($name==0){
                        echo '<script>alert("此暱稱已經被取走了唷QQ，請重新輸入！")</script>';
                        return view('login_system/register');
                    }
                }
                $user=[
                    'name'      =>  $this->request->getVar('name'),
                    'mail'      =>  $this->request->getVar('mail'),
                    'account'   =>  $this->request->getVar('account'),
                    'password'  =>  $this->request->getVar('password')
                ];
                $model->save($user);
                echo '<script>alert("註冊成功！！！")</script>';
                return view('post_system/homepage');
                
                //$_SESSION['mail'] = $_POST['mail'];
                //return redirect('mail');
            }
            else    $data['validation'] = $this->validator;
        }
       // return view('login_system/register',$data);
    }

    public function mail()
    {
        helper(['form','url']);
        $email = \Config\Services::email();;

        $email->setfrom('ccubombbomb@gmail.com');
        $email->setto('wzk789wzk@gmail.com');
        $email->setsubject('Test');
        $email->setmessage('快點睡啦');

        if ($email->send()){
            echo 'success';
        }else {
            echo 'fail';
        }
    }

    public function compare_account()
    {
        $data=[];
        helper(['form']);

        if($this->request->getMethod()=='post'){
            $rule = [
                'account'   =>  'required|max_length[20]',
                'password'  =>  'required|min_length[8]|max_length[20]|validateUser[mail,password]',
            ];
            $errors = [
                'password'  =>  [
                    'validateUser'  =>  'Email or Password don\'t match'
                ]
            ];
            if(!$this->validate($rule,$errors)){
                $data['validation']=$this->validator;
            }
            else{
                $model=new Members();
                $user = $model->where('account',$this->request->getVar('account'))
                              ->first();
                $this->setUserSession($user);
                return view('post_system/homepage');
            }
            return view('login_system/login',$data);
        }
    }
    
    private function setUserSession($user){
        $data=[
            'id'        =>  $user['id'],
            'mail'      =>  $user['mail'],
            'account'   =>  $user['account'],
            'password'  =>  $user['password'],
            'Login'     =>  true
        ];
        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->set('Login',false);
        return view('post_system/homepage');
    }

}
?>