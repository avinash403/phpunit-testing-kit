<?php

namespace Tests;

use TestingKit\PrivateAccess;
use PHPUnit\Framework\TestCase;
use Tests\Fake\FakeClass;

class PrivateAccessTest extends TestCase
{
	use PrivateAccess;

	private $object;

	private $CONSTANT = 'constant';

	public function setUp()
	{
		$this->object = new FakeClass;
	}

	public function test_getPrivateMethod_without_argument()
	{
		$this->object->publicProperty = $this->CONSTANT;

		$methodResponse = $this->getPrivateMethod($this->object, 'privateMethod');

		$this->assertEquals($methodResponse, $this->CONSTANT);
	}

	public function test_getPrivateMethod_with_argument()
	{
		$methodResponse = $this->getPrivateMethod($this->object, 'privateMethodWithArgument',[$this->CONSTANT]);

		$this->assertEquals($methodResponse, $this->CONSTANT);
	}

	public function test_setPrivateProperty()
	{
		$this->setPrivateProperty($this->object, 'privateProperty',$this->CONSTANT);

		$methodResponse = $this->object->getPrivateProperty();

		$this->assertEquals($methodResponse, $this->CONSTANT);
	}

	public function test_getPrivateProperty()
	{
		$this->object->setPrivateProperty($this->CONSTANT);

		$methodResponse = $this->getPrivateProperty($this->object, 'privateProperty');

		$this->assertEquals($methodResponse, $this->CONSTANT);
	}
}
