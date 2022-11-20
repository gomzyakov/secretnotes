<?php

namespace App\Repository;

use App\Models\Note;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Support\Facades\Crypt;

class NotesRepository
{
    /**
     * @var Hashids
     */
    private Hashids $hashids;

    /**
     * @param Hashids $hashids
     */
    public function __construct(Hashids $hashids)
    {
        $this->hashids = $hashids;
    }

    /**
     * @param string $slug
     *
     * @return Note|null
     */
    public function findBySlug(string $slug): ?Note
    {
        $note = Note::where('slug', $slug)->first();

        return $note instanceof Note ? $note : null;
    }

    /**
     * Create the note.
     *
     * @param string      $text
     * @param string|null $password
     * @param Carbon|null $expiration_date
     *
     * @return Note
     */
    public function create(string $text, ?string $password, ?Carbon $expiration_date): Note
    {
        $note                  = new Note();
        $note->text            = Crypt::encryptString($text);
        $note->expiration_date = $expiration_date;
        $note->password        = $password;
        $note->slug            = time() . '-' . mt_rand(); // TODO Bad! Rewrite!
        $note->save();

        $note->refresh();

        $note->slug = $this->hashids->encode($note->id); // TODO Need to remove "double save"
        $note->save();

        return $note;
    }
}
