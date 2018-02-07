<?php
/**
 *
 */

namespace phpdo\tests\framework;


use phpdo\context\HttpContext;
use phpdo\framework\IProcessor;
use phpdo\http\Request;
use phpdo\processor\route\HttpRouteProcessor;
use phpdo\processor\wrapper\FunctionProcessor;
use phpdo\tests\PhpDoTest;

class HttpRouteProcessorTest extends PhpDoTest {

    /**
     * @var HttpContext
     */
    protected $context;

    /**
     * @var array
     */
    protected $route;
    
    public function setUp(){
        parent::setUp();
        $this->context = $this->PHPDO->makeContext();
        $this->route = array(
            array("GET", "path"=>"test/12", "processors" => array(function($context, $processFlow) {
                
            })),
            array("GET", "path"=>"test/13", "processors" => array("HttpProcessorDemo:test13")),
            array("GET", "pattern"=>'\/test\/12', "processors" => array(function($context, $processorFlow) {

            })),
            array("GET", "pattern"=>'\/test\/13', "processors" => array("HttpProcessorDemo:test13")),
            array("POST", "path"=>"test/12", "processors" => array(function($context, $processFlow){

            })),
        );
    }


    public function testParseRouteSuccess() {
        $httpRouteProcessor = HttpRouteProcessor::createWithArray($this->route);
        
        $this->context->setRequest(Request::create("/test/12", "GET"));
        $ret = $httpRouteProcessor->parseRoute($this->context);
        $this->assertTrue(is_array($ret) && count($ret) == 1);
        $this->assertTrue($ret[0] instanceof FunctionProcessor);
        
    }
}