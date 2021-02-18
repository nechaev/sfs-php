<?php

class BaseTest extends \PHPUnit\Framework\TestCase
{

    /** c() tests */

    public function testCOneParam()
    {
        $this->assertSame(15, c("produce3", "add3")(2));
        $this->assertSame(9, c("produce3", "array_sum")([1, 2]));
    }

    public function testCSeveralParams()
    {
        $this->assertSame(8, c("add3", "max")(1, 5));
    }

    public function testCMethodsClass()
    {
        $f = new Foo;
        $this->assertSame("5", c([$f, "baz"], "max")(1, 5));
    }

    public function testCStaticMethodsClass()
    {
        $this->assertSame(5, c("Foo::st", "max")(1, 5));
    }

    /** pe() tests */

    public function testPe()
    {
        $this->assertSame([1, 2, 3, 4, 5], pe('range', 5)(1));
        $this->assertSame(5, pe('max', 3)(5));
    }
}
