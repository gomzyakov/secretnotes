<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @group xxx
 */
class NoteCreateTest extends TestCase
{
    public function test_create_with_min_params()
    {
        $response = $this->post(route('note.create', [
            'text' => $this->faker->text(),
        ]));

        $response->assertStatus(302);

        $response->assertSee('Вот ссылка на заметку');

        // TODO Check DB
    }

    public function test_create_with_full_params()
    {
        $response = $this->post(route('note.create', [
            'text' => $this->faker->text(),
            'encrypt_password'=>null,
            'expiration_date'=>null
        ]));

        $response->assertStatus(302);

        // TODO Check DB
    }

//    public function test_empty_note()
//    {
//        $response = $this->post(route('note.create'));
//
//        $response->assertStatus(302);
//        dump($response->content());
//
//        //$response->assertSee('екст пуст или произошла ошиб');
//    }
}
