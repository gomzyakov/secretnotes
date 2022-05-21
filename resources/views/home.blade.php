@extends('layout.app')

@section('title', 'Секретные заметки')

@section('content')

    <div class="relative h-screen">
        <header class="md:ml-8">
            <div class="mt-4 text-center md:text-left">
                <span class="px-2 text-xl">
                    Заметка предназначена для одноразового использования и зашифрована в нашей базе данных.
                </span>
            </div>
        </header>
        <main class="mt-4 text-center md:ml-8 md:text-left">
            <form action="{{ route('note.create') }}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="pb-2 ml-2 text-green-500">
                        <p class="font-extrabold font-outfit">
                            Успешно! Вот ссылка на заметку : {{ session('success') }}
                        </p>
                    </div>
                @endif
                <textarea name="text" id="text" placeholder="Напишите здесь"
                          class="w-9/12 p-4 rounded-lg resize-none font-outfit focus:outline-none h-80"
                          style="background-color : #282828"></textarea>
                @error('text')
                <div class="py-2 text-red-500">
                    <p class="font-extrabold font-outfit">
                        {{ $message }}
                    </p>
                </div>
                @enderror
                <div class="md:w-9/12 md:flex">
                    <div class="md:flex-1">
                        <div class="mt-4">
                            <label class="px-2 text-xl" for="expiration_date">Срок годности</label>
                            <br>
                            <select name="expiration_date" id="expiration_date"
                                    class="px-2 py-2 m-auto my-2 ml-1.5 text-lg text-white rounded outline-none appearance-none font-outfit lg:py-1 lg:my-2 focus:outline-none"
                                    style="background-color : #282828">
                                <option value="never" selected>Никогда</option>
                                <option value="1_hour">Один час</option>
                                <option value="1_day">Один день</option>
                                <option value="1_week">Одна неделя</option>
                                <option value="1_month">Один месяц</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="password_input" class="px-2 text-lg font-extrabold text-white font-outfit">
                                Пароль (необязательно)
                            </label>

                            <br>

                            <input type="text" name="encrypt_password"
                                   class="px-2 py-1 ml-1.5 mt-2 text-white rounded-sm font-outfit focus:outline-none"
                                   style="background-color : #282828" id="password_input">
                            @error('encrypt_password')
                            <div class="py-2 text-red-500">
                                <p class="font-extrabold font-outfit">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="-mt-4 text-center md:mt-0 md:flex-1">
                        <input type="submit" style="background-color : #282828"
                               class="text-center mb-2 mt-12 focus:outline-none align-middle px-4 font-outfit font-extrabold cursor-pointer pt-1.5 pb-2 text-2xl rounded"
                               value="Создать">
                    </div>
                </div>
            </form>
        </main>
    </div>

    @include('home.layout.features')

    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Отличные сценарии использования</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('{{ asset('assets/unsplash-photo-1.jpg') }}');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Short title, long jacket</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                                <small>Earth</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                                <small>3d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('{{ asset('assets/unsplash-photo-2.jpg') }}');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                                <small>Pakistan</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                                <small>4d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('{{ asset('assets/unsplash-photo-3.jpg') }}');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center me-3">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"/></svg>
                                <small>California</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"/></svg>
                                <small>5d</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
