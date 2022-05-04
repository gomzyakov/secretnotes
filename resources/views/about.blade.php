<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo-full.png') }}" type="image/x-icon">
    <meta name="description" content="SecretNotes - зашифрованные и самоуничтожающиеся заметки">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" rel="stylesheet">

    <title>SecretNotes - Секретные заметки</title>
</head>

<style>
    *::-webkit-scrollbar {
        display: none;
    }

    html,
    body {
        height: 100%;
        background-color: #1C1C1C;
    }

</style>

<body class="overflow-hidden text-white">
<div id="content" class="fadeIn">
    <header>
        <div id="header" class="w-full py-4 text-white">
            <div class="ml-6">
                <div class="text-center md:text-left">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/logo.png') }}" class="w-16 py-2 m-auto md:m-0" alt="logo"></a>
                </div>

                <div class="mt-1 text-center md:text-lg md:text-left">
                    <h3 class="font-outfit font-extrabold md:ml-0.5 -ml-4">
                        Зашифрованные и самоуничтожающиеся заметки
                    </h3>
                </div>


                <div class="mt-12">
                        <span class="text-2xl font-extrabold font-outfit">
                            Как хранятся мои заметки?
                        </span>
                    <p class="mt-4 font-outfit">
                        Ваши заметки всегда шифруются AES-256 в нашей базе данных, а это значит, что даже автор сайта не
                        может их прочитать!
                    </p>
                </div>
                <div class="mt-12">
                    <span class="text-2xl font-extrabold font-outfit">
                        Можно ли узнать, была ли уже открыта заметка?
                    </span>
                    <p class="pr-2 mt-4  font-outfit">
                        Нет, SecretNotes не хранит никакой информации об открытии заметки.
                        <br>
                        Таким образом, <span class="font-extrabold font-outfit">невозможно узнать</span>, существовала
                        ли уже заметка или она уже была открыта.
                    </p>

                </div>
                <div class="mt-12 ">
                    <span class="text-2xl font-extrabold font-outfit">
                        Может ли SecretNotes хранить только заметки?
                    </span>
                    <p class="pr-2 mt-4  font-outfit">
                        Скоро будут обновления, позволяющие передавать изображения и другие типы файлов, только один раз!
                    </p>
                </div>
            </div>
        </div>
    </header>
</div>
</body>

</html>
