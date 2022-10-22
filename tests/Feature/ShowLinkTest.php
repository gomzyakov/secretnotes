<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\NoteController::showLink
 */
class ShowLinkTest extends TestCase
{
    public function test_show_link_page(): void
    {
        $response = $this->get(route('page.note.show_link', $slug = $this->faker->word));

        $response->assertStatus(200);

        $response->assertSee('Secret note successfully created!');
        $response->assertSee($slug);
        $response->assertSee('Copy note to clipboard');
    }
}
