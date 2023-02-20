<?php
namespace app\common\models;

use think\Model;

class AdminModel extends Model
{
    protected $name = 'admin';


    public function get($where = [],$without = ['password'],$field = [],$query = 'find')
    {
        $data = $this->where($where)->field($field)->$query();
        !empty($data) ? $data->toArray():$data = [];
        return $data;
    }

}
