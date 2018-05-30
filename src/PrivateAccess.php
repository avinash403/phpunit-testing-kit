<?php 

namespace TestingKit;

use ReflectionClass;

/**
 * Gives access to non-public methods and properties, so that those can be tested easily
 */
Trait PrivateAccess
{
	/**
     * Gets non-public methods
     * @param   $classObject Object  object of the class, whose methods are required to be fetched
     * @param   $methodName String   name of the method as string
     * @param   $arguments Array     method arguments
     * @return  ReflectionMethod
     */
    protected function getPrivateMethod(&$classObject, $methodName, $arguments=[]) {
        $reflector = new ReflectionClass(get_class($classObject));
        $method = $reflector->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($classObject, $arguments);
    }
    
    /**
     * Sets non-public properties
     * @param object $classObject       object of the class, whose property are required to be fetched
     * @param string $propertyName      name of the perperty as string
     * @param any $value                new value of the property
     * @return  void
     */
    protected function setPrivateProperty(&$classObject, $propertyName, $value) {
        $reflector = new ReflectionClass($classObject);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        $property->setValue($classObject, $value);
    }
    
    /**
     * Gets non-public properties at any instant
     * @param object $classObject       object of the class, whose properties are required to be fetched
     * @param string $propertyName      name of the property as string
     * @param any $value                new value of the property
     * @return any                      returns the value of the property
     */
    protected function getPrivateProperty(&$classObject, $propertyName) {
        $reflector = new ReflectionClass($classObject);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($classObject);
    }

}