<?php

namespace Tests\Feature\Page;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\NoteController::showCreatePage
 */
class NewNoteTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get(route('page.note.new'));

        $response->assertStatus(200);

        $response->assertSee('Write your note here...');
        $response->assertSee('Create note');
    }
}
