<?php 

namespace Tests\Fake;

/**
 * meant for testing method accessibilty (for PrivateAccess trait)
 */
class FakeClass
{
	private $privateProperty;

	public $publicProperty;

	private function privateMethod()
	{
		return $this->publicProperty;
	}

	private function privateMethodWithArgument($argument)
	{
		return $argument;
	}

	public function getPrivateProperty()
	{
		return $this->privateProperty;
	}

	public function setPrivateProperty($value)
	{
		$this->privateProperty = $value;
	}

}