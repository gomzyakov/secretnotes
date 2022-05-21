<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Hashids\Hashids;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return ViewFactory|View
     */
    public function create(): View|ViewFactory
    {
        return view('note.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $hashids = new Hashids('', 5);

        // TODO To request
        $request->validate(
            [
                'text' => 'string|required|max:20000',
                'encrypt_password' => 'string|min:6|max:100|nullable',
            ],
            [
                'text.required' => 'Это поле обязательно к заполнению',
                'text.string' => 'Текст пуст или произошла ошибка',
                'text.max' => 'Ограничение составляет 20 000 символов',
                'encrypt_password.string' => 'К сожалению, произошла ошибка',
                'encrypt_password.min' => 'Пароль должен быть не менее 6 символов',
                'encrypt_password.max' => 'Пароль не может превышать 100 символов',
            ]
        );

        if ($request->expiration_date !== 'never') {
            switch ($request->expiration_date) {
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

        $request->encrypt_password ? $password = \Hash::make($request->encrypt_password) : $password = 'none';

        $note = Note::create([
            'text' => Crypt::encryptString($request->text),
            'expiration_date' => $expiration_date,
            'password' => $password,
            'slug' => '',
        ]);

        $note->slug = $hashids->encode($note->id);
        $note->save();

        return back()->with(['success' => route('note.display', $note->slug)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
