<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NoteCreateRequest;
use App\Models\Note;
use Hashids\Hashids;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Crypt;

class NoteController extends Controller
{
    /**
     * Store a newly created note in storage.
     *
     * @param NoteCreateRequest $request
     *
     * @return JsonResponse
     */
    public function create(NoteCreateRequest $request): JsonResponse
    {
        $hashids = new Hashids('', 5);

        if ($request->getExpirationDate()) {
            // TODO to prif
            switch ($request->getExpirationDate()) {
                case '1_hour':
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
        } else {
            $expiration_date = null;
        }

        $password = $request->getPassword() ? \Hash::make($request->getPassword()) : null;

        // TODO new Note
        $note = Note::create([
            'text'            => Crypt::encryptString($request->getText()),
            'expiration_date' => $expiration_date,
            'password'        => $password,
            'slug'            => '',
        ]);

        $note->slug = $hashids->encode($note->id);
        $note->save();

        return new JsonResponse([
            'url_show_note_link' => route('page.note.show_link', $note->slug),
            'slug'               => $note->slug,
        ], 200);
    }
}
