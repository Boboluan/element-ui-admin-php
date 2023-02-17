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
      if(!$this->checkUser($params)){
          compact();
      }
    }


    public function  checkUser($params)
    {
        $User = $this->User->get(['username'=>$params['username']],'password','','find')->toArray();
//        dump($User);
        if(empty($User)){

        }
    }

}
