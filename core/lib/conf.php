<?php
namespace core\lib;
/**
 * Created by changzhanjie123@163.com
 * User: czj
 * Date: 2017/2/23
 * Time: 下午9:07
 */

class conf
{
    static public $confArr=array();
    static public function get($name,$file){

        /**
         *  1 判断配置文件是否存在
         *  2 判断配置是否存在
         *  3 缓存配置conf
         */

        $path = KUANG.'/core/inc/'.$file.'.php';
        if(isset(self::$confArr[$file])){

            return self::$confArr[$file][$name];

        }else{
            if(is_file($path)){
                $confArr = include $path;
                if(isset($confArr[$name])){
                    self::$confArr[$file] = $confArr;
                    return $confArr[$name];
                }else{
                    throw new \Exception('配置不存在'.$name);
                }
            }else{

                throw new \Exception('找不到配置文件'.$file);

            }
        }

    }

    static public function all($file){

        /**
         *  1 判断配置文件是否存在
         *  2 判断配置是否存在
         *  3 缓存配置conf
         */

        $path = KUANG.'/core/inc/'.$file.'.php';
        if(isset(self::$confArr[$file])){

            return self::$confArr[$file];

        }else{
            if(is_file($path)){
                $confArr = include $path;
                self::$confArr[$file]=$confArr;
                return $confArr;
            }else{

                throw new \Exception('找不到配置文件'.$file);

            }
        }


    }
}