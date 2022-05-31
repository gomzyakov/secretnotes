<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ViewFactory|View
     */
    public function index(): View|ViewFactory
    {
        return view('home', [
            'active_navbar_item' => 'home',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return ViewFactory|View
     */
    public function showCreatePage(): View|ViewFactory
    {
        return view('note.new', [
            'hide_footer' => true,
            'active_navbar_item' => 'new.note',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return ViewFactory|View
     */
    public function showLink($slug): View|ViewFactory
    {
        $note = Note::where('slug', $slug)->first();

        if ($note->expiration_date ?? '' && $note->expiration_date < now()) {
            $note->delete();

            return view('password-note');
        }

        $note->password ?? '' === 'none' ? $password = false : $password = true;

        return view('password-note', compact('note', 'password'));
    }

    public function decrypt($slug)
    {
        request()->validate([
            'decrypt_password' => 'string|max:100',
        ], [
            'decrypt_password.string' => 'Le champ est vide ou une erreur est survenue',
            'decrypt_password.max' => 'Le mot de passe ne peut pas faire plus de 100 caractères',
        ]);

        $note = Note::where('slug', $slug)->firstOr(
            function () {
                return back()->withErrors(['404' => 'Désolé cette note n\'existe pas ou elle a déjà été lue']);
            }
        );

        if ($note->password !== 'none') {
            if (Hash::check(request()->decrypt_password, $note->password)) {
                $note->text = Crypt::decryptString($note->text);
            } else {
                return back()->withErrors(['bad_password' => 'Mot de passe incorrect']);
            }
        } else {
            $note->text = Crypt::decryptString($note->text);
        }

        $note->delete();

        return view('show-note', compact('note'));
    }
}
