<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/27
 * Time: 17:07
 */

namespace phpdo;


abstract class Context{


    public function __construct(PHPDO $PHPDO) {
        
    }

    /**
     * 获取配置信息
     * @param string $key
     * @return void
     */
    public function config($key) {
        
    }

    /**
     * container proxy
     * @param $class
     * @return mixed
     */
    public function make($class) {
        return null;
    }


    /**
     * 输出
     * @return void
     */
    abstract public function output();

}