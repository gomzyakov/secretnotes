<?php

namespace App\Repository;

use App\Models\Note;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Support\Facades\Crypt;

class NotesRepository
{
    public function __construct(private Hashids $hashids)
    {
    }

    public function findBySlug(string $slug): ?Note
    {
        $note = Note::where('slug', $slug)->first();

        return $note instanceof Note ? $note : null;
    }

    /**
     * Create the note.
     *
     *
     */
    public function create(string $text, ?string $password, ?Carbon $expiration_date): Note
    {
        $note                  = new Note();
        $note->text            = Crypt::encryptString($text);
        $note->expiration_date = $expiration_date;
        $note->password        = $password;
        $note->slug            = time() . '-' . random_int(0, mt_getrandmax()); // TODO Bad! Rewrite!
        $note->save();

        $note->refresh();

        $note->slug = $this->hashids->encode($note->id); // TODO Need to remove "double save"
        $note->save();

        return $note;
    }
}
