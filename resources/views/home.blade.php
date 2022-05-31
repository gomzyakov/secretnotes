@extends('layout.app')

@section('title', 'Секретные заметки')

@section('content')

    <div class="container">

        <form action="{{ route('api.note.create') }}" method="POST">
            @csrf

            @include('note.layout.row-textarea')

            <div class="row mt-2 mb-4">
                <div class="col-md-8 mx-auto">
                    <div id="textareaHelp" class="form-text">
                        Вы можете создать секретную заметку с <a href="#">дополнительными настройками</a>.
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
