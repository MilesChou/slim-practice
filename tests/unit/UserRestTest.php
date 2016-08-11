<?php


class UserRestTest extends \Codeception\Test\Unit
{
    /**
     * @var \Slim\App
     */
    protected $app;

    /**
     * @var \Slim\Container
     */
    protected $container;

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->app = require __DIR__ . '/../../bootstrap.php';
        $this->container = $this->app->getContainer();
    }

    protected function _after()
    {
        $this->container = null;
        $this->app = null;
    }

    // tests
    public function testHelloSomeoneCall()
    {
        $url = '/hello/Miles';

        $environmentMock = \Slim\Http\Environment::mock([
        	'REQUEST_METHOD' => 'GET',
        	'REQUEST_URI' => $url,
        ]);

        $this->container['environment'] = $environmentMock;

        // Act
        $this->app->run(true);
        $response = (string) $this->container['response']->getBody();
        $statusCode = $this->container['response']->getStatusCode();

        // Assert
        $this->assertRegExp("/Hello/", $response);
        $this->assertRegExp("/Miles/", $response);
        $this->assertEquals(200, $statusCode);
    }
}
