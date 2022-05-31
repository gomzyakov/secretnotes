<?php

namespace Tests\Feature\API\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class CreateTest extends TestCase
{
    public function test_create_with_min_params()
    {
        $response = $this->postJson(route('api.note.create', [
            'text' => $text = $this->faker->text(),
        ]));

        $encrypted_text = Crypt::encryptString($text);
        $response->assertStatus(302);

        dump($response->content());

        $this->assertDatabaseHas('notes', [
            'text' => $encrypted_text,
        ]);
    }

    /**
     * @group xxx
     */
    public function test_create_with_full_params()
    {
        $response = $this->postJson(route('api.note.create', [
            'text' => $text = $this->faker->text(),
            'encrypt_password'=>'foo_bar',
            'expiration_date'=>'1_week',
        ]));

        $encrypted_text = Crypt::encryptString($text);

        $response->assertStatus(200);

        dump($encrypted_text);
        $slug = $response->json('slug');
        dump($slug);

        $note = Note::where('slug', $slug)->first();

        $this->assertInstanceOf(Note::class, $note);

        $this->assertDatabaseHas('notes', ['slug' => $response->json('slug')]);

        $this->assertSame($text, Crypt::decryptString($note->text));
    }

//    public function test_empty_note()
//    {
//        $response = $this->post(route('api.note.create'));
//
//        $response->assertStatus(302);
//        dump($response->content());
//
//        //$response->assertSee('екст пуст или произошла ошиб');
//    }

    // TODO Тест на текст 65К+ символов
}
