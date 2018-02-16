<?php

use CryptoPete\Frost\FrostController;
use CryptoPete\Frost\FrostFactory;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testApiReturn()
    {
        $api = (new FrostFactory)->api('.env.example');
        $this->assertInstanceOf(FrostController::class, $api);
    }
}
