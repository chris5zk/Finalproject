<?php
namespace App\Validation;
use App\Models\Members;

class UserRules
{
    public function validateUser(string $str,string $fields,array $data){
        $model = new Members();
        $user = $model->where('account',$data['account'])
                      ->first();
        if(!$user)
            return false;

        return password_verify($data['password'],$user['password']);
    }
}