@extends('layout.app')

@section('title', 'Создать секретную заметку')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8">
                <div class="alert alert-warning" role="alert">
                    Заметка предназначена для одноразового использования и зашифрована в нашей базе данных.
                </div>
            </div>
        </div>

        <form action="{{ route('note.create') }}" method="POST">
            @csrf

            @if (session('success'))
                <div class="pb-2 ml-2 text-green-500">
                    <p class="font-extrabold font-outfit">
                        Успешно! Вот ссылка на заметку : {{ session('success') }}
                    </p>
                </div>
            @endif

            {{-- note.form.text --}}
            <div class="row mt-2 mb-4">
                <div class="col-md-8 mx-auto">
                    <div class="form-floating">
                        <textarea class="form-control"
                                  name="text"
                                  id="text"
                                  placeholder="Напишите здесь"
                                  style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Напишите здесь</label>
                    </div>
                    @error('text')
                    <div class="py-2 text-red-500">
                        <p class="font-extrabold font-outfit">
                            {{ $message }}
                        </p>
                    </div>
                    @enderror
                </div>
            </div>
            {{-- / note.form.text --}}

            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-floating">
                        <select class="form-select" name="expiration_date" id="expiration_date"
                                aria-label="select example">
                            <option value="never" selected>Никогда</option>
                            <option value="1_hour">Один час</option>
                            <option value="1_day">Один день</option>
                            <option value="1_week">Одна неделя</option>
                            <option value="1_month">Один месяц</option>
                        </select>
                        <label for="expiration_date">Срок годности</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input class="form-control"
                               name="encrypt_password"
                               id="password_input"
                               type="password"
                               placeholder="Password">
                        <label for="password_input">Пароль (необязательно)</label>

                        @error('encrypt_password')
                        <div class="py-2 text-red-500">
                            <p class="font-extrabold font-outfit">
                                {{ $message }}
                            </p>
                        </div>
                        @enderror
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

@endsection
