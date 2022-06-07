<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @coversNothing
 */
class BlogTest extends TestCase
{
    public function test_get_about_page()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }
}
