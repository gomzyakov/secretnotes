@extends('layout.app')

@section('title', 'Создать секретную заметку')

@section('content')

    <div class="container">

        <form action="{{ route('api.note.create') }}" method="POST">
            @csrf

            @include('note.layout.row-textarea')
            @include('note.layout.row-params')

            <div class="row my-5 justify-content-center">
                <div class="col-8">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-primary">Создать</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection
