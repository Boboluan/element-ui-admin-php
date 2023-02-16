<?php

namespace app\admin\controller;

use app\common\service\UserService;

class User extends Common implements \app\apiInterfaceFile\User
{

    public function UserInfo()
    {
        // TODO: Implement UserInfo() method.
    }

    public function UserLogin()
    {
        // TODO: Implement UserLogin() method.
        return UserService::UserLoginService($this->request->post());
    }


    public function UserLogout()
    {
        // TODO: Implement UserLogout() method.
    }

}
