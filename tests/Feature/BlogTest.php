<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\PageController::showAboutPage
 */
class BlogTest extends TestCase
{
    public function test_get_about_page()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }
}
