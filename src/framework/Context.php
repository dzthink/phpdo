<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/27
 * Time: 17:07
 */

namespace phpdo\framework;


abstract class Context{


    /**
     * @var IConfig
     */
    protected $config;

    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @var array
     */
    protected $exception;

    /**
     * @var array
     */
    protected $state;

    /**
     * 获取配置
     * @return IConfig
     */
    public function getConfig(): IConfig {
        return $this->config;
    }


    /**
     * 获取container
     * @return IContainer
     */
    public function getContainer(): IContainer {
        return $this->container;
    }


    /**
     * exception处理
     * @param \Exception $e
     */
    public function pushException(\Exception $e) {
        array_push($this->exception, $e);
    }

    /**
     * 初始化
     * @return void
     */
    public function initialize(IConfig $config, IContainer $container) {
        $this->config = $config;
        $this->container = $container;
    }

    /**
     * 取出最后一个exception
     * @return \Exception
     */
    public function popException() {
        return array_pop($this->exception);
    }
    /**
     * 查看后异常
     * @return \Exception
     */
    public function peekException() {
        $length = count($this->exception);
        return $length == 0? null : $this->exception[$length - 1];
    }


    /**
     * @param string $key
     * @return mixed
     */
    public function getState($key = null) {
        return null;
    }

    /**
     *
     * @param string $key
     * @param mixed $state
     * @return void
     */
    public function putState($key, $state) {

    }

    /**
     * 设置state值
     * @param array $state
     */
    public function setState($state) {

    }

}