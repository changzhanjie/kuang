<?php
/**
 * 路由类
 * by changzhanjie123@164.com
 */
namespace core\lib;

use core\lib\conf;

class route
{
    public $ctrl;
    public $action;

    public function __construct()
    {
        //判断路径是否存在如果为根路径直接返回首页
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path=$_SERVER['REQUEST_URI'];
            if($path=='/kuang/'){
                $this->ctrl=conf::get('D_CTRL','config');
                $this->action=conf::get('D_ACTION','config');
            }else {
                //拆分url,去除首尾'/'
                $patharr = explode('/', trim($path, '/'));
                if (isset($patharr[0])) {
                    $this->ctrl = $patharr[0];
                    unset($patharr[0]);
                } else {
                    $this->ctrl = conf::get('D_CTRL', 'config');
                }
                if (isset($patharr[1])) {
                    $this->action = $patharr[1];
                    unset($patharr[1]);
                } else {
                    $this->action = conf::get('D_ACTION', 'config');
                }
                //获取 get参数
                $getNum = count($patharr) + 2;
                //p($patharr);
                $i = 2;
                while ($i < $getNum) {
                    if (isset($patharr[$i + 1]))
                        $_GET[$patharr[$i]] = $patharr[$i + 1];
                    $i = $i + 2;
                }
            }

        }else{
            $this->ctrl=conf::get('D_CTRL','config');
            $this->action=conf::get('D_ACTION','config');
        }
    }

}