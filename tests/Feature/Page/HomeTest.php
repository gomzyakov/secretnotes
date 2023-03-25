<?php

namespace Tests\Feature\Page;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\NoteController::index
 */
class HomeTest extends TestCase
{
    public function test_get_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Write your note here...');
        $response->assertSee('Create note');
        $response->assertSee('How can I use secret notes?');
    }

    public function test_non_exists_page(): void
    {
        $response = $this->get('/xxx');

        $response->assertStatus(404);
    }
}
