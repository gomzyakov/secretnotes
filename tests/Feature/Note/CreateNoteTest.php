<?php

namespace Tests\Feature\Note;

use App\Models\Note;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\NoteController::createNote
 */
class CreateNoteTest extends TestCase
{
    public function test_create_with_min_params(): void
    {
        $response = $this->post(
            route('note.create', ['text' => $text = $this->faker->text()])
        );


        $response->assertSee('Secret note successfully created!');
        $response->assertSee('Copy note to clipboard');

        $note_slug = $this->getNoteSlugFromHTMLPage($response);

        $this->assertDatabaseHas('notes', ['slug' => $note_slug]);

        /** @var Note $note */
        $note = Note::where('slug', $note_slug)->first();

        $this->assertInstanceOf(Note::class, $note);
        $this->assertSame($text, Crypt::decryptString($note->text));
    }

    public function test_create_with_full_params(): void
    {
        $response = $this->post(
            route('note.create', [
                'text'             => $text = $this->faker->text(),
                'encrypt_password' => 'foo_bar',
                'expiration_date'  => '1_week',
            ])
        );

        $response->assertStatus(200);

        $note_slug = $this->getNoteSlugFromHTMLPage($response);

        $this->assertDatabaseHas('notes', ['slug' => $note_slug]);

        /** @var Note $note */
        $note = Note::where('slug', $note_slug)->first();

        $this->assertInstanceOf(Note::class, $note);
        $this->assertSame($text, Crypt::decryptString($note->text));
    }

    public function test_empty_note(): void
    {
        $response = $this->post(
            route('note.create', ['text' => ''])
        );

        // TODO Is this the correct response status?
        $response->assertStatus(302);
    }

    private function getNoteSlugFromHTMLPage(TestResponse $response): string
    {
        // Get note URL from HTML page
        preg_match('/<input type="hidden" id="secret-note-url" value="(.+)">/iu', $response->content(), $matches);
        $note_url = $matches[1];

        // Get last word from URL after a slash
        preg_match('/[^\\/]+$/', $note_url, $matches);

        return $matches[0];
    }

    // TODO test 65K+ characters
    // TODO test_too_short_password
}
