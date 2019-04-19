<?php
//自动加载等基类
namespace core;

class M
{
    public static $classMap=array();

    public $assign;
    static public function run(){

            \core\lib\log::init();

            \core\lib\log::log('test','error');

            $route =  new \core\lib\route();
            $className = $route->ctrl;
            $classAction = $route->action.'Action';
            $ctrlFile=APP.'/ctrl/'.$className.'Ctrl.php';
            $classNew= MODULE.'\ctrl\\'.$className.'Ctrl';
            if(is_file($ctrlFile)){
                include $ctrlFile;
                $classNameR = new $classNew;
                $ctrl=$classNameR->$classAction();

            }else{
                p('index is not');
            }

    }
    static public function load($class){

        //自动加载

        if(isset($classMap[$class])){
            return true;
        }else{
            $str=str_replace('\\','/',$class);
            $path=KUANG.'/'.$str.'.php';
            if(is_file($path)){
                include $path;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }

    }
    //视图传函数
    public function assign($name,$value){

        $this->assign[$name]=$value;

    }
    //调用视图文件
    public function display($file){

            $file= APP.'/view/'.$file;
            if(is_file($file)){



                \Twig_Autoloader::register();
                $loader = new \Twig_Loader_Filesystem(APP.'/view');
                $twig = new \Twig_Environment($loader, array(
                    //'cache' => '/log/',
                ));
                $template = $twig->load('index.html');

                $template->display($this->assign?$this->assign:'');
            }

    }
}