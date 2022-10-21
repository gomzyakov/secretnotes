<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NoteCreateRequest;
use App\Models\Note;
use App\Services\NotesRepository;
use Hashids\Hashids;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    /**
     * Store a newly created note in storage.
     *
     * @param NoteCreateRequest $request
     * @param NotesRepository   $notes_repository
     *
     * @return JsonResponse
     */
    public function create(
        NoteCreateRequest $request,
        NotesRepository $notes_repository
    ): JsonResponse {
        $hashids = new Hashids('', 5);

        if ($request->getExpirationDate()) {
            // TODO to prif
            switch ($request->getExpirationDate()) {
                case '1_hour': //
                    $expiration_date = date_format(now()->addHours(1), 'Y-m-d H:i:s');

                    break;
                case '1_day':
                    $expiration_date = date_format(now()->addDays(1), 'Y-m-d H:i:s');

                    break;
                case '1_month':
                    $expiration_date = date_format(now()->addMonths(1), 'Y-m-d H:i:s');

                    break;
                case '1_week':
                    $expiration_date = date_format(now()->addWeeks(1), 'Y-m-d H:i:s');

                    break;
            }
        }

        $note = $notes_repository->create(
            $request->getText(),
            $request->getPassword() ? Hash::make($request->getPassword()) : null,
            $expiration_date ?? null
        );

        return new JsonResponse([
            'url_show_note_link' => route('page.note.show_link', $note->slug),
            'slug'               => $note->slug,
        ], 200);
    }
}
