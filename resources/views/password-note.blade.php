<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="PandoreNote, des notes chiffrées et autodestructrice">
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

<body class="overflow-hidden">
<div id="content" class="fadeIn">

    <header>
        <div id="header" class="w-full py-4 text-white">
            <div class="ml-6">
                <div class="text-center md:text-left">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/logo.png') }}" class="w-16 py-2 m-auto md:m-0" alt="logo"></a>
                </div>

                <div class="mt-1 text-center md:text-lg md:text-left">
                    <h3 class="font-extrabold font-outfit" md:ml-0.5 -ml-4 font-semibold">
                    Зашифрованные и самоуничтожающиеся заметки
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <main class="text-center md:ml-4 md:text-left">
        @if (is_null($note))
            <div class="text-red-500 py-2 text-xl px-2 md:px-0 md:ml-2.5">
                <p class="font-extrabold font-outfit">
                    К сожалению, этой заметки не существует, она уже прочитана или срок ее действия истек
                </p>
            </div>
        @else
            <form action=" {{ route('note.decrypt', $note->slug ?? '') }}" method="POST">
                @csrf
                <div class="ml-2.5 mt-10">
                    @if ($password)
                        <h2 class="px-2 text-xl font-extrabold text-white font-outfit md:px-0">
                            Введите пароль от заметки
                        </h2>
                        <input type="password" placeholder="Ici" required
                               class="rounded-sm focus:outline-none font-outfit text-white px-2 py-0.5 w-64 mt-2"
                               style="background-color : #282828" name="decrypt_password">
                        <br>
                        <br>
                        @if ($errors->any())
                            <div class="py-2 text-red-500">
                                <p class="font-extrabold font-outfit">
                                    {{ $errors->first() }}
                                </p>
                            </div>
                        @endif
                    @endif
                    <input type="submit" style="background-color : #282828"
                           class="px-4 font-extrabold text-center text-white align-middle focus:outline-none font-outfit            cursor-pointer pt-1.5 pb-2 text-xl rounded"
                           value="Расшифровать" onclick="disableButton(this)">
                    <p class="px-2 mt-8 font-extrabold text-white font-outfit md:px-0">
                        После расшифровки этой заметки она будет удалена из базы данных
                    </p>
                </div>
            </form>
        @endif
    </main>
</div>

<script>
    function disableButton(e) {
        setTimeout(function () {
            e.disabled = true;
        }, (100));
    }
</script>
</body>

</html>
