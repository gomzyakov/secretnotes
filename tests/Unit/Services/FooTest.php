<?php

namespace Tests\Unit\Services;

use App\Services\Foo;
use PHPUnit\Framework\TestCase;

class FooTest extends TestCase
{
    public function test_foo()
    {
        $this->assertSame(13, Foo::foo(34));
    }
}
