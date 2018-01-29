<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/26
 * Time: 18:32
 */

namespace phpdo\framework;


interface IContainer {

    /**
     * make a instance from container
     * @param $abstract
     * @param array $parameters
     * @return mixed
     */
    public function make($abstract, $parameters = []);

    /**
     * 绑定接口和实现
     * @param $abstract string 接口
     * @param $concrete \Closure|string 创建方法
     * @param bool $shared 单例/共享
     * @return mixed
     */
    public function bind($abstract, $concrete, $shared = true);
}