<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/26
 * Time: 18:30
 */

namespace phpdo;


class ProcessFlow {

    /**
     * @var array[IProcessor]
     */
    protected $processors;

    /**
     * @var integer
     */
    protected $current;

    public function __construct() {
        $this->clear();
    }

    /**
     * 请求处理
     * @param Context $context
     * @throws \Exception
     */
    public function process(Context $context) {
        foreach($this->processors as $p) {
            try {
                if(!$p->process($context, $this)) {
                    break;
                }
            } catch (\Exception $e) {
                //todo process 异常处理
            }
        }
        $context->output();
    }


    /**
     * 向尾部增加一个处理器
     * @param IProcessor $processor
     * @return void
     */
    public function push(IProcessor $processor) {
        array_push($this->processors, $processor);
    }

    /**
     * @param IProcessor $processor
     * @param $index
     */
    public function insert(IProcessor $processor, $index = -1) {
        if($index == -1) {
            $index = count($this->processors) - 1;
        }
        array_splice($this->processors, $this->current, array($processor));
    }

    /**
     * 清空
     */
    public function clear() {
        $this->processors = array();
        $this->index = 0;
    }
}