<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class helpersTest extends TestCase
{
    /**
     * @test
     */
    public function myFunction_test() : void
    {
        $this->assertEquals('example', my_function());
    }
}
