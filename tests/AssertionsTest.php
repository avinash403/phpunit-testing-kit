<?php 

namespace Tests;

use TestingKit\Assertions;
use PHPUnit\Framework\TestCase;

class AssertionsTest extends TestCase
{
	use Assertions;

	public function test_assertAlpha()
	{
		$this->assertAlpha('s');
	}

	public function test_assertNotAlpha()
	{
		$this->assertNotAlpha('1');
	}

	public function test_assertNumber()
	{
		$this->assertNumber('1');
	}

	public function test_assertNotNumber()
	{
		$this->assertNotNumber('&');
	}

	public function test_assertArrayHasKeys()
	{
		$this->assertArrayHasKeys(['a','b','c'],['a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5]);
	}

	public function test_assertStringContainsSubstring()
	{
		$this->assertStringContainsSubstring('I am batman','batman');
	}
	
	public function test_assertStringNotContainsSubstring()
	{
		$this->assertStringNotContainsSubstring('I am batman','superman');
	}	

}
