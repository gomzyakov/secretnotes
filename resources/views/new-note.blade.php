@extends('layout.app')

@section('title', 'Создать секретную заметку')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                Заметка предназначена для одноразового использования и зашифрована в нашей базе данных.
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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-floating">
                        <textarea class="form-control"
                                  name="text"
                                  id="text"
                                  placeholder="Напишите здесь"
                                  style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
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


            <div class="md:w-9/12 md:flex">
                <div class="md:flex-1">
                    <div class="mt-4">
                        <label class="px-2 text-xl" for="expiration_date">Срок годности</label>
                        <br>
                        <select name="expiration_date" id="expiration_date"
                                class="px-2 py-2 m-auto my-2 ml-1.5 text-lg text-white rounded outline-none appearance-none font-outfit lg:py-1 lg:my-2 focus:outline-none"
                                style="background-color : red">
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


        <form>
            <div class="row g-3">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>

@endsection
