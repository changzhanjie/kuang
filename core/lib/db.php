<?php
/**
 * 数据库连接
 * by changzhanjie123@164.com
 */
namespace core\lib;

use core\lib\conf;

class db extends \Medoo\Medoo
{

        public function __construct()
        {
            $option=conf::all('db_inc');
            parent::__construct($option);

        }

}