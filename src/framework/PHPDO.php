<?php
namespace phpdo\framework;

/**
 * phpdo核心
 * @Author dzthink@qq.com
 * @Date: 2017/8/11
 */

use phpdo\container\Container;
class PHPDO {

    /**
     * @var IContainer
     */
    protected $container;

    /**
     * @var IConfig
     */
    protected $config;

    /**
     * @var ProcessFlow
     */
    protected $processFlow;


    public function __construct(IConfig $config = null, IContainer $container = null) {
        $this->config = $config;

        if(is_null($container)) {
            $container = new Container();
        }
        $this->container = $container;
        
        $this->processFlow = new ProcessFlow();
    }

    /**
     * 处理请求
     * @param Context $context
     * @param IProcessor|\Closure $dispatcher
     * @return Context 
     */
    public function go(Context $context, IProcessor $dispatcher) {
        $this->processFlow->back($dispatcher);
        $this->processFlow->process($context);
        return $context;
    }



    /**
     * 回收数据
     * @return void
     */
    public function terminate() {

    }

    /**
     * 创建context
     * @return Context
     */
    public function makeContext() {
        $context = $this->container->make(Context::class);
        $context->initialize($this->config, $this->container);
        return $context;
    }

    /**
     * 获取容器对象
     * @return IContainer
     */
    public function getContainer() {
        return $this->container;
    }

}
