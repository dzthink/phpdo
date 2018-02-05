<?php
/**
 * Created by PhpStorm.
 * User: zxduan
 * Date: 2018/1/29
 * Time: 19:31
 */

namespace phpdo\processor\route;


use phpdo\context\HttpContext;
use phpdo\framework\IProcessor;
use phpdo\framework\ProcessFlow;
use phpdo\processor\wrapper\FunctionProcessor;
use phpdo\processor\wrapper\MethodProcessor;

class HttpRouteProcessor implements IProcessor {

    /**
     * @var array
     */
    protected $routes;

    /**
     * HttpRouteProcessor constructor.
     */
    public function __construct() {
        $this->routes = array(
            "GET" => array(),
            "POST" => array(),
            "PUT" => array(),
            "DELETE" => array()
        );
    }

    /**
     * 从xml文件初始化路由数据
     * @param string $xml xml数据
     * @return self
     */
    public static function createWithXml($xml) {
        
    }

    /**
     * 采用php 数组初始化
     * @param array $array 路由数据
     * @return self
     */
    public static function createWithArray($array) {
        $httpRouteProcessor = new HttpRouteProcessor();
        foreach($array as $route) {
            if(!is_array($route) || count($route) < 2) {
                throw new \Exception("invalid route");
            }
            $method = strtoupper($route[0]);
            if(!isset($httpRouteProcessor->routes[$method])) {
                throw new \Exception("invalid route, unknown http method!");
            }
            $path = isset($route["path"])? $route["path"] : "";
            $pattern = isset($route["pattern"])? $route["pattern"] : "";
            $func = isset($route["func"])? $route["func"] : null;
            $processors = isset($route["processors"])? $route["processors"] : array();
            if(empty($processors)) {
                throw new \Exception("invalid route, empty processor list!");
            }
            foreach($processors as $index => $p) {
                if(is_callable($p)) {
                    $processors[$index] = new FunctionProcessor($p);
                    continue;
                }
                
                if(is_string($p)) {
                    $classAndMethod = explode(":", $p);
                    if(count($classAndMethod) == 2) {
                        list($class, $m) = $classAndMethod;
                        $processors[$index] = new MethodProcessor($class, $m);
                        continue;
                    }
                }

                throw new \Exception("invalid route, unsupported processor");
            }
            $httpRouteProcessor->routes[$method][] = new Route($path, $pattern, $func, $processors);
        }
        return $httpRouteProcessor; 
    }
    /**
     * 处理请求
     * @param HttpContext $context
     * @param ProcessFlow $processFlow
     * @return bool|IProcessor
     * @throws \Exception
     */
    public function process($context, ProcessFlow $processFlow) {
        echo $context->request()->getPathInfo();
    }

    /**
     * 解析路由
     * @param HttpContext $context
     * @return array IProcessor
     */
    public function parseRoute($context) {
        $method = $context->request()->getMethod();
        $method = strtoupper($method);
        foreach($this->routes[$method] as $r) {
            if(!$r->isMatch($context)) {
                continue;
            }
            return $r->getProcessors();
        }

        throw new \Exception("url not found!");
    }
}

/**
 * Class Route
 * @package phpdo\processor\route
 */
class Route {

    /**
     * @var string path
     */
    protected $path;

    /**
     * @var string pattern
     */
    protected $pattern;

    /**
     * @var \Closure
     */
    protected $func;

    /**
     * @var array
     */
    protected $processors;
    
    public function __construct($path = "", $pattern = "", $func = null, $processor = array()) {
        $this->path = trim($path);
        $this->pattern = trim($pattern);
        $this->func = $func;
        $this->processors = $processor;
    }

    /**
     * @param HttpContext $context 判断一个context是否和路由match
     * @return bool
     */
    public function isMatch($context) {
        $match = true;
        if($match && $this->path != "") {
            $match = $this->path == $context->request()->getUri();
        }
        
        if($match && $this->pattern != "") {
            $match = preg_match("/$this->pattern/", $context->request()->getUri()) == 1;
        }
        
        if($match && $this->func != null) {
            $match = call_user_func_array($this->func, array($context));
        }
        
        return $match;
    }

    /**
     * @return array
     */
    public function getProcessors()
    {
        return $this->processors;
    }
    
}