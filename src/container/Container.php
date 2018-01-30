<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/30
 * Time: 20:16
 */

namespace phpdo\container;


use phpdo\framework\IContainer;

class Container implements IContainer {

    /**
     * @var \Pimple\Container
     */
    protected $container;

    public function __construct() {
        $this->container = new \Pimple\Container();
    }

    /**
     * make a instance from container
     * @param $abstract string
     * @return mixed
     * @throws \Exception
     */
    public function make($abstract) {
        if(!isset($this->container[$abstract])) {
            throw new \Exception("type $abstract not found!");
        }
        return $this->container[$abstract];
    }

    /**
     * 绑定接口和实现
     * @param $abstract string 接口
     * @param $concrete \Closure|string 创建方法
     * @param bool $shared 单例/共享
     * @throws \Exception
     * @return mixed
     */
    public function bind($abstract, $concrete, $shared = true) {
        if(is_string($concrete)) {
            if(!class_exists($concrete)) {
                throw new \Exception("type $concrete not defined!");
            }
            $ser = function($c) use($concrete) {
                return new $concrete();
            };

            $this->container[$abstract] = $shared? $ser : $this->container->factory($ser);
        }

        if($concrete instanceof \Closure) {
            $this->container[$abstract] = $shared? $concrete : $this->container->factory($concrete);
        }


    }
}