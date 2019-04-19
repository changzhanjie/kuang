<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2017/2/23
 * Time: 下午11:12
 */
namespace app\model;

use core\lib\db;

class test extends db
{

    public $table='test';

    public function lists()
    {
        $res=$this->select($this->table,'*');
        return $res;
    }

    public function getOne($id){

        $ret = $this->get($this->table,'*',array('id'=>$id));

        return $ret;

    }
}