<?php

namespace Bone\Test\Controller;

use Bone\Http\Response;
use Codeception\TestCase\Test;
use Psr\Http\Message\ResponseInterface;

class ControllerTest extends Test
{
    public function testGetResponseWithLayout()
    {
        $controller = new FakeController();
        $response = $controller->responseWithLayout(new Response(), 'xxx');
        self::assertInstanceOf(ResponseInterface::class, $response);
        self::assertTrue($response->hasHeader('layout'));
        self::assertEquals('xxx', $response->getHeader('layout')[0]);
    }
}


