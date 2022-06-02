@extends('layout.app')

@section('title', 'Открыть секретную заметку')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">

                <div class="alert alert-success" role="alert">
                    Успешно! Вот ссылка на заметку: {{ $note_url }}
                </div>

            </div>
        </div>

        {{-- TODO Add button "Destroy note now" --}}
        {{-- TODO Add button "E-mail link" --}}

    </div>

@endsection

