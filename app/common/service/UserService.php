<?php

namespace app\common\service;



class UserService
{

    protected $User;

    public function __construct()
    {
        $this->User = new \app\common\models\AdminModel();
    }


    public  function UserLoginService($params)
    {
//        if(!$result = $this->checkUser($params)){
//            return $result;
//        }
        return $this->checkUser($params);
    }


    public function  checkUser($params)
    {
        $User = $this->User->get(['username'=>$params['username']],'password','','find')->toArray();
        if(empty($User)){
            return DataReturn(config('status.user_not_exist'));
        }else{
            if(!password_verify($params['password'],$User['password'])){
                return DataReturn(config('status.password_wrong'));
            }
        }
        $Return['token'] = '1212121212';
        $Return['userInfo'] = $User;
        return $User;
    }

}
