<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\NoteCreateRequest;
use App\Services\NotesRepository;
use Carbon\Carbon;
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
        $note = $notes_repository->create(
            $request->getText(),
            $request->getPassword() ? Hash::make($request->getPassword()) : null,
            $this->getExpirationDate($request->getExpirationDate())
        );

        return new JsonResponse([
            'url_show_note_link' => route('page.note.show_link', $note->slug),
            'slug'               => $note->slug,
        ], 200);
    }

    /**
     * TODO Temporary method.
     *
     * @return JsonResponse
     */
    public function fakeCreate(): JsonResponse
    {
        return new JsonResponse([
            'url_show_note_link' => route('home'),
            'slug'               => 'hello',
        ], 200);
    }

    /**
     * TODO Get date in UTC, not key "1_month".
     *
     * @param string|null $expiration_date_value
     *
     * @return Carbon|null
     */
    private function getExpirationDate(?string $expiration_date_value): ?Carbon
    {
        if (! $expiration_date_value) {
            return null;
        }

        return match ($expiration_date_value) {
            '1_hour'  => Carbon::now()->addHour(),
            '1_day'   => Carbon::now()->addDay(),
            '1_month' => Carbon::now()->addMonth(),
            '1_week'  => Carbon::now()->addWeek(),
            default   => null,
        };
    }
}
