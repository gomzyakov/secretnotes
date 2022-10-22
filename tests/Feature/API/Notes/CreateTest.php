<?php

namespace Tests\Feature\API\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\API\NoteController::create
 */
class CreateTest extends TestCase
{
    public function test_create_with_min_params(): void
    {
        $response = $this->postJson(route(
            'api.note.create',
            [
                'text' => $text = $this->faker->text(),
            ]
        ));

        $response->assertStatus(200);

        $this->assertDatabaseHas('notes', ['slug' => $response->json('slug')]);

        $note = Note::where('slug', $response->json('slug'))->first();

        $this->assertInstanceOf(Note::class, $note);
        $this->assertSame($text, Crypt::decryptString($note->text));
    }

    public function test_create_with_full_params(): void
    {
        $response = $this->postJson(route(
            'api.note.create',
            [
                'text'             => $text = $this->faker->text(),
                'encrypt_password' => 'foo_bar',
                'expiration_date'  => '1_week',
            ]
        ));

        $response->assertStatus(200);

        $this->assertDatabaseHas('notes', ['slug' => $response->json('slug')]);

        $note = Note::where('slug', $response->json('slug'))->first();

        $this->assertInstanceOf(Note::class, $note);
        $this->assertSame($text, Crypt::decryptString($note->text));
    }

    public function test_empty_note(): void
    {
        $response = $this->postJson(route('api.note.create'));

        $response->assertStatus(422);

        $this->assertSame('validation.required', $response->json('message'));
    }

    // TODO Тест на текст 65К+ символов
    // TODO test_too_short_password
}
