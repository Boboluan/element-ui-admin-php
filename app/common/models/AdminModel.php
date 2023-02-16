<?php
namespace app\common\models;

use think\Model;

class AdminModel extends Model
{
    protected $name = 'admin';


    public function get($where = [],$field = ['*'])
    {
       return $this->where($where)->field($field)->find();
    }

}
