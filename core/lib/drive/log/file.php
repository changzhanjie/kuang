<?php
namespace core\lib\drive\log;
use core\lib\conf;

/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2017/2/23
 * Time: 下午9:55
 */
class file
{
    public $path;

    public function __construct()
    {
        $option = conf::get('OPTION','log');
        $this->path=$option['PATH'];
    }

    public  function log($massage,$file='log'){


        if(!is_dir($this->path)){
            mkdir($this->path,'0777',true);
        }
        $massage = date('Y-m-d H:i:s').">>>>>>>>>>>>".$massage;
        file_put_contents($this->path.$file.'.log',json_encode($massage).PHP_EOL, FILE_APPEND | LOCK_EX);
    }


}