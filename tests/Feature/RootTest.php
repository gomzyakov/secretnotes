<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\NoteController::index
 */
class RootTest extends TestCase
{
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_non_exists_page()
    {
        $response = $this->get('/xxx');

        $response->assertStatus(404);
    }
}
