<?php 

namespace TestingKit;

/**
 * Some commonly used assertions that are not available in phpunit
 */
Trait Assertions
{
    /**
     * asserts if the given string is alpha or not
     * @param string $value     the value that need to be checked for assertion
     * @return  void
     */
    public function assertAlpha($value){
        $isAlpha = preg_match( '/[a-zA-Z]/', $value ) ? true : false;   
        $message = "$value is not an alphabet";
        self::assertThat($isAlpha, self::isTrue(), $message);
    }
    
    /**
     * asserts if the given string is alpha or not
     * @param string $value     the value that need to be checked for assertion
     * @return  void
     */
    public function assertNotAlpha($value){
        $isAlpha = preg_match( '/[a-zA-Z]/', $value ) ? true : false;   
        $message = "$value is an alphabet";
        self::assertThat($isAlpha, self::isFalse(), $message);
    }

    /**
     * asserts if the given string is Number or not
     * @param string $value     the value that need to be checked for assertion
     * @return  void
     */
    public function assertNumber($value){
        $isNumber = preg_match( '/\d/', $value ) ? true : false;   
        $message = "$value is not a number";
        self::assertThat($isNumber, self::isTrue(), $message);
    }
	
	/**
     * asserts if the given string is Number or not
     * @param string $value     the value that need to be checked for assertion
     * @return  void
     */
    public function assertNotNumber($value){
        $isNumber = preg_match( '/\d/', $value ) ? true : false;   
        $message = "$value is a number";
        self::assertThat($isNumber, self::isFalse(), $message);
    }


    /**
     * asserts if given array has keys
     * NOTE: this must be used only if multiple keys are required to be checked. 
     *        for checking a single key, there already has a method called assertArrayHasKey in phpunit
     * @param array $arrayOfKeys     array of keys that is required to be tested
     * @param array $targetArray     array which is required to be tested
     * @return  boolean         true if $value is an number else false
     */
    public function assertArrayHasKeys($arrayOfKeys, $targetArray)
    {
        $notFoundKeys = [];
        foreach ($arrayOfKeys as $key){
            if(!array_key_exists($key, $targetArray)){
                array_push($notFoundKeys, $key);
            }
        }
        //if not found key is empty, it means all the keys are found. else not
        $hasKeys = !$notFoundKeys ? true : false;
        $notFoundKeysJson = json_encode($notFoundKeys);
        $message = "$notFoundKeysJson not found in target array";
        self::assertThat($hasKeys, self::isTrue(), $message);
    }
    
    /**
     * Asserts if the given substring is there in the string or not
     * @param string $string        string that needs to be searched (haystack)
     * @param string $substring     string that is to be found (needle)
     * @return void         
     */
    public function assertStringContainsSubstring($string, $substring){
        $message = "'$substring' not found in target string";
        $hasSubstring = (strpos($string, $substring) !== false) ? true : false;
        self::assertThat($hasSubstring, self::isTrue(), $message);
    }
    
    /**
     * Asserts if the given substring is there in the string or not
     * @param string $string        string that needs to be searched (haystack)
     * @param string $substring     string that is to be found (needle)
     * @return void         
     */
    public function assertStringNotContainsSubstring($string, $substring){
        $message = "'$substring' is present in target string";
        $hasSubstring = (strpos($string, $substring) !== false) ? true : false;
        self::assertThat($hasSubstring, self::isFalse(), $message);
    }

}

