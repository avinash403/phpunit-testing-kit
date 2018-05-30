# PHPunit testing kit
Collection of useful traits and classes that can be handy while testing a PHP application.

## Installation by Composer

	$ composer require phpunit/phpunit-testing-kit

## Available Traits

### Assertions

Contains some common assertions that is commonly used but PHPunit doesn't provide it.

**USAGE**
```
use TestingKit\Assertions;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
	use Assertions;

	public function test_exampleTest()
	{
		$this->assertAlpha('a');
	}
}

```


**Available Assertions**
```sh
	* assertAlpha
	* assertNotAlpha
	* assertNumber
	* assertNotNumber
	* assertArrayHasKeys
	* assertStringContainsSubstring
	* assertStringNotContainsSubstring
```

### PrivateAccess

Allows testing private and protected method and properties of a class.


**USAGE**
```
use TestingKit\PrivateAccess;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
	use PrivateAccess;

	public function test_exampleTest_forGettingPrivateMethod()
	{
		$classObject = new Class();
		
		//getting private method
		$methodResponse = $this->getPrivateMethod($classObject, 'exampleMethod', ['some text']);
		
		$this->assertEquals($methodResponse, 'some text');
	}
}

class ExampleClass
{
	private exampleMethod($someArgument)
	{
		return $someArgument;
	}
}

```

**Available Features**
```sh
	* getPrivateMethod
	* setPrivateProperty
	* getPrivateProperty

```


### Test
Run test by simply typing 
```composer test```
from the root directory of this package.


### Contribute on github
clone this repository( https://github.com/avinash403/laravel-dynamic-observer.git ), make your changes and raise a pull request to development branch
