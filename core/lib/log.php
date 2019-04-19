<?php
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2017/2/23
 * Time: 下午9:54
 */
namespace core\lib;

use core\lib\conf;

class log
{
        static $class;


        static  public  function init(){

            $drive = conf::get('DRIVE','log');
            $class = DRIVE_PATH.'\log\\'.$drive;
            self::$class = new $class;
        }

        static public function log($name,$file)
        {

            self::$class->log($name,$file);

        }

}