<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\PageController::showAboutPage
 */
class ShowLinkTest extends TestCase
{
    public function test_get_about_page()
    {
        $response = $this->get(route('page.note.show_link', $slug = $this->faker->word));

        $response->assertStatus(200);

        $response->assertSee('Secret note successfully created!');
        $response->assertSee($slug);
        $response->assertSee('Copy note to clipboard');
    }
}
