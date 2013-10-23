<?php namespace Saas\Email\Tests;

use Illuminate\Container\Container;
use Saas\Email\Foo;

class FooTest extends \PHPUnit_Framework_TestCase
{
	public function testConstructor()
	{
		$app = new Container();
		$foo = new Foo($app);

		$this->assertInstanceOf('\Saas\Email\Foo', $foo);
	}

	public function testBar()
	{
		$app = new Container();
		$app['request'] = 'Foo Bar';
		$foo = new Foo($app);

		$this->assertEquals($foo->bar(), 'Foo Bar');
	}
}