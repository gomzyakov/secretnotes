<?php

namespace Tests\Feature;

use Tests\TestCase;

class RootTest extends TestCase
{
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_fallback_page()
    {
        $response = $this->get('/xxx');

        $response->assertStatus(302);
    }
}
