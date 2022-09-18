@extends('layout.app')

@section('title', 'Секретные заметки')

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <h5 class="card-header">Как хранятся мои заметки?</h5>
                    <div class="card-body">
                        <p class="card-text">
                            Ваши заметки всегда шифруются AES-256 в нашей базе данных, а это значит,
                            что даже автор сайта не может их прочитать!
                        </p>
                    </div>
                </div>

                <div class="card my-5">
                    <h5 class="card-header">Можно ли узнать, была ли уже открыта заметка?</h5>
                    <div class="card-body">
                        <p class="card-text">
                            Нет, Secretic не хранит никакой информации об открытии заметки.
                        </p>
                        <p class="card-text">
                            Таким образом, <span class="font-extrabold font-outfit">невозможно узнать</span>,
                            существовала ли уже заметка или она уже была открыта.
                        </p>
                    </div>
                </div>

                <div class="card my-5">
                    <h5 class="card-header">Может ли Secretic хранить только заметки?</h5>
                    <div class="card-body">
                        <p class="card-text">
                            Скоро будут обновления, позволяющие передавать изображения и другие типы файлов,
                            только один раз!
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

