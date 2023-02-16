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
        $User = $this->User->get(['username'=>$params['username']]);
        dump($User);
    }

}
