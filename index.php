<?php
/**
 * 入口文件
 *
 */

define('KUANG',realpath('./'));
define('CORE',KUANG.'/core');
define('APP',KUANG.'/app');
define('MODULE','app');
define('DRIVE_PATH','\core\lib\drive');
define('DEBUG',false);

include "vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('dispaly_errors','on');
}else{
    ini_set('dispaly_errors','Off');
}

include CORE.'/common/global.fun.php';

include CORE.'/M.php';
spl_autoload_register('\core\M::load');

\core\M::run();
