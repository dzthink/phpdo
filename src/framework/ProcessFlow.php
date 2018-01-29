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
        $this->interceptError();
    }

    /**
     * 请求处理
     * @param Context $context
     */
    public function process(Context $context) {
        while (($p = array_shift($this->processors)) != null) {
            try{
                $ret = $p->process($context, $this);
                //强行终止
                if(false === $ret) {
                    break;
                }

                if($ret instanceof IProcessor) {
                    $this->front($ret);
                }
            } catch (\Exception $e) {
                $context->pushException($e);
            }

        }
    }


    /**
     * 向尾部增加一个处理器
     * @param IProcessor $processor
     * @return void
     */
    public function back(IProcessor $processor) {
        array_push($this->processors, $processor);
    }

    /**
     * @param IProcessor $processor
     */
    public function front(IProcessor $processor) {
        array_unshift($this->processors, $processor);
    }

    /**
     * 清空
     */
    public function clear() {
        $this->processors = array();
    }


    /**
     * 将严重错误转换为ErrorException
     */
    protected function interceptError() {
        set_error_handler(function($code, $msg, $file, $line){
            throw new \ErrorException($msg, $code, 1, $file, $line);
        });
    }
}