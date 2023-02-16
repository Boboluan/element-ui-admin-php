<?php

namespace app\command\controller;

use app\BaseController;

class Index extends BaseController
{


    public function index()
    {
        return view('index');
    }

    /**
     * @return bool
     */
    public function test()
    {
      dump(lang('product')['Please select product category']);
    }



    /*接受判断*/
    public function query()
    {
        $command = trim(input('command'));
//        dump($command);die();
        switch ($command)
        {
            case 1:
                $command = 'osk';
                $this->queryCommand($command);
                break;
            case 2:
                $command = 'dxdiag';
                $this->queryCommand($command);
                break;
            case 3:
                $command = 'write';
                $this->queryCommand($command);
                break;
            case 4:
                $command = 'shrpubw';
                $this->queryCommand($command);
                break;
            case 5:
                $command = 'ipconfig';
                $result =  $this->returnQueryCommand($command);
                break;
        }
        return $result;
    }



    /*执行命令行*/
    private function queryCommand($command)
    {
        exec($command,$output,$result_code);
    }


    /*执行命令行*/
    private function returnQueryCommand($command)
    {
        $result = shell_exec($command);
        $result = iconv("utf-8","gb2312//IGNORE",$result);
        return $result;
    }




}



