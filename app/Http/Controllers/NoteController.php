<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteCreateRequest;
use App\Models\Note;
use App\Repository\NotesRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|ViewFactory
     */
    public function index(): View|ViewFactory
    {
        return view('home', [
            'notes_count' => 123, // TODO Write notes counter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|ViewFactory
     */
    public function showCreatePage(): View|ViewFactory
    {
        return view('note.new', [
            'hide_footer' => true,
        ]);
    }

    /**
     * Show a warning before decrypting the note (or a message that the note does not exist).
     *
     * @param string          $slug
     * @param NotesRepository $notes_repository
     *
     * @return View|ViewFactory
     */
    public function openLink(
        string $slug,
        NotesRepository $notes_repository
    ): View|ViewFactory {
        $note = $notes_repository->findBySlug($slug);

        if ($note instanceof Note && $note->expiration_date !== null && $note->expiration_date < now()) {
            $note->delete();
            $note = null;
        }

        return view('note.before_watching', [
            'hide_footer' => true,
            'note'        => $note,
        ]);
    }

    /**
     * Store a newly created note in storage.
     *
     * @param NoteCreateRequest $request
     * @param NotesRepository   $notes_repository
     *
     * @return Application|View|ViewFactory
     */
    public function createNote(
        NoteCreateRequest $request,
        NotesRepository $notes_repository
    ): Application|View|ViewFactory {
        $note = $notes_repository->create(
            $request->getText(),
            $request->getPassword() ? Hash::make($request->getPassword()) : null,
            $this->getExpirationDate($request->getExpirationDate())
        );

        return view('note.show-link', [
            'hide_footer' => true,
            'note_url'    => route('note.open_link', ['slug' => $note->slug]),
        ]);
    }

    /**
     * @param string          $slug
     * @param NotesRepository $notes_repository
     *
     * @return Application|RedirectResponse|View|ViewFactory
     */
    public function decrypt(
        string $slug,
        NotesRepository $notes_repository
    ): ViewFactory|View|Application|RedirectResponse {
        // TODO to request
        /** @phpstan-ignore-next-line  */
        request()->validate([
            'decrypt_password' => 'string|max:100',
        ]);

        $note = $notes_repository->findBySlug($slug);
        if (! $note instanceof Note) {
            return back()->withErrors(['404' => 'The note does not exist, has already been read, or has expired']);
        }

        // TODO Simplify this block
        if ($note->password !== null) {
            /** @phpstan-ignore-next-line  */
            if (! Hash::check(request()->decrypt_password, $note->password)) {
                return back()->withErrors(['bad_password' => 'Password incorrect']);
            }
        }

        $note_text = Crypt::decryptString($note->text);

        $note->delete();

        return view('note.show', [
            'hide_footer' => true,
            'note_text'   => $note_text,
        ]);
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
