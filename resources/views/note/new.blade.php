@extends('layout.app')

@section('title', 'Создать секретную заметку')

@section('content')

    <div class="container">

        @include('note.layout.text-intro')

        <form action="{{ route('note.create') }}" method="POST">
            @csrf

            {{-- note.form.text --}}
            <div class="row mt-2 mb-4">
                <div class="col-md-8 mx-auto">

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            Успешно! Вот ссылка на заметку : {{ session('success') }}
                        </div>
                    @endif

                    @include('note.layout.textarea')
                </div>
            </div>
            {{-- / note.form.text --}}

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
