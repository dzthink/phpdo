<?php
namespace phpdo\tests\framework;

use phpdo\framework\Context;
use \phpdo\context\HttpContext;
use \phpdo\tests\PhpDoTest;
class PhpDoFrameworkTest extends PhpDoTest {



    public function testHello() {
        $context = $this->PHPDO->makeContext();
        $context->setRequest(\phpdo\http\Request::create("/phoneix/api.php", "GET", array("a")));
        $this->PHPDO->go($context, new \phpdo\processor\HttpRouteProcessor());
    }
}
