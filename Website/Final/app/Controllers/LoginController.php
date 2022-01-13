<?php

namespace App\Controllers;
use CondeIgiter\HTTP\Response;
use App\Controllers\BaseController;
use App\Models\Members;

class LoginController extends BaseController
{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function login()
    {
        return view('login_system/login');
    }

    public function register()
    {
        return view('login_system/register');
    }

    public function profile()
    {
        return view('login_system/profile');
    }

    /*註冊帳號*/
   public function new_account()
    {
        helper(['form','url']);
        
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name'      =>  'required|max_length[20]',
                'mail'      =>  'required|valid_email',
                'account'   =>  'required|min_length[8]|max_length[20]',
                'password'  =>  'required|min_length[8]|max_length[100]',
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
            }
            else    $data['validation'] = $this->validator;
        }
        return view('login_system/register',$data);
    }

    /*登入比對帳號*/ 
    public function compare_account()
    {
        $data=[];
        helper(['form']);

        if($this->request->getMethod()=='post'){
            $rule = [
                'account'   =>  'required|max_length[20]',
                'password'  =>  'required|min_length[8]|max_length[100]|validateUser[mail,password]',
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
    
    /*帳號資料存到伺服器端*/
    private function setUserSession($user){
        $data=[
            'id'        =>  $user['id'],
            'name'      =>  $user['name'],
            'mail'      =>  $user['mail'],
            'account'   =>  $user['account'],
            'password'  =>  $user['password'],
            'Login'     =>  true
        ];
        session()->set($data);
        return true;
    }

    /*登出*/ 
    public function logout()
    {
        session()->set('Login',false);
        echo '<script>alert("登出成功！！")</script>';
        return view('post_system/homepage');
    }

    /*個人資料修改*/
    public function profile_edit()
    {
        $data = [];
        helper(['form']);
        $model = new Members();

        if($this->request->getMethod() == 'post'){
            $rules=[
                'name'      =>  'required|max_length[20]'
            ];
            if($this->request->getPost('password') != ''){
                $rules['password'] = 'required|min_length[8]|max_length[100]';
                $rules['passconf'] = 'matches[password]';
            }
            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{
                $newData = [
                    'id'        =>  session()->get('id'),
                    'name'      =>  $this->request->getPost('name'),
                    'account'   =>  $this->request->getPost('account'),
                ];
                if($this->request->getPost('password') != ''){
                    $newData['password'] = $this->request->getPost('password');
                }
                $model->save($newData);
                echo '<script>alert("更改成功!！");</script>';
                return view('login_system/profile');
            }
        }
        $data['user'] = $model->where('id',session()->get('id'))->first();
        return view('login_system/profile',$data);
    }
}
?>