<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class FakeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}
