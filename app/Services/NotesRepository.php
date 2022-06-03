<?php

namespace App\Services;

use App\Models\Note;

class NotesRepository
{
    /**
     * @param string $slug
     * @return Note|null
     */
    public function findBySlug(string $slug): ?Note
    {
        $note = Note::where('slug', $slug)->first();

        return $note instanceof Note ? $note : null;
    }
}
