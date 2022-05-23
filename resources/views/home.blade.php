@extends('layout.app')

@section('title', 'Секретные заметки')

@section('content')

    <div class="container">

        @include('note.layout.text-intro')

        <form action="{{ route('note.create') }}" method="POST">
            @csrf

            <div class="row mt-2 mb-4">
                <div class="col-md-8 mx-auto">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            Успешно! Вот ссылка на заметку : {{ session('success') }}
                        </div>
                    @endif

                    @include('note.layout.textarea')

                    <div id="textareaHelp" class="form-text">
                        Вы можете создать секретную заметку с <a href="{{ route('note.create') }}">дополнительными настройками</a>.
                    </div>

                </div>
            </div>

            <div class="row my-5 justify-content-center">
                <div class="col-8">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-primary">Создать</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

    @include('home.layout.cases')
    @include('home.layout.features')

@endsection
