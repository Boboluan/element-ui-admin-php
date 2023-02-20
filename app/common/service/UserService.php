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
        return  $this->checkUser($params);
    }


    public function  checkUser($params)
    {
        $User = $this->User->get(['username'=>$params['username']],'password','','find');
        if(empty($User)){
            return renderError('该用户不存在');
        }else{
//            if(!password_verify($params['password'],$User['password'])){
            if($params['password']!=$User['password']){
                return renderError('密码错误');
            }
        }
        $Return['token'] = '1212121212';
        $Return['userInfo'] = $User;
        return renderSuccess($Return);
    }



    public function UserInfoService($user_id)
    {
        $User = $this->User->get(['id'=>$user_id],'password','','find');
        return $User;
    }


}
