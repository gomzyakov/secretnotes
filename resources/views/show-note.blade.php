<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="PandoreNote, des notes chiffrées et autodestructrice">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;800&display=swap" rel="stylesheet">

    <title>PandoreNote - Notes chiffrées</title>
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

<body class="" style="background-color : #1d1d1d">
    <div id="content" class="fadeIn">
        <header>
            <div id="header" class="w-full py-4 text-white">
                <div class="ml-6">
                    <div class="text-center md:text-left">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/logo.png') }}" class="w-16 py-2 m-auto md:m-0" alt="logo"></a>
                    </div>

                    <div class="mt-1 text-center md:text-lg md:text-left">
                        <h3 class="font-outfit md:ml-0.5 -ml-4">
                            Notes chiffrées et autodestructrice <img src="{{ asset('assets/lock.png') }}"
                                class="inline w-5 h-5 -mt-1.5 ml-1" alt="leaficon">
                        </h3>
                    </div>
                </div>
            </div>
        </header>
        <style>
            *::-webkit-scrollbar {
                display: none;
            }

        </style>
        <main class="text-center md:ml-4 md:text-left">
            <form action="{{ route('note.decrypt', $note->slug) }}" method="POST">
                @csrf
                <div class="mt-10 ml-2 text-center text-white md:text-left">
                    <div class="w-full">
                        <p class="break-words pl-1.5 pr-8 font-outfit whitespace-pre-line">
                            {{ $note->text }}
                        </p>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
