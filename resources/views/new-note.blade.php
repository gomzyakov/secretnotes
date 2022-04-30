<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/logo-full.png') }}" type="image/x-icon">
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


<body class="font-extrabold text-white fadeIn font-outfit">
    <div class="relative h-screen">
        <header class="md:ml-8">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/logo.png') }}" class="w-16 py-2 m-auto md:m-0" alt="logo"></a>
            <div class="mt-4 text-center md:text-left">

                <span class="px-2 text-xl">La note sera à usage unique et chiffrée au sein de notre base de
                    donnée</span>
            </div>
        </header>
        <main class="mt-4 text-center md:ml-8 md:text-left">
            <form action="{{ route('note.create') }}" method="POST">
                @csrf
                @if (session('success'))
                    <div class="pb-2 ml-2 text-green-500">
                        <p class="font-extrabold font-outfit">
                            Succès ! Voici le lien de la note : {{ session('success') }}
                        </p>
                    </div>
                @endif
                <textarea name="text" id="text" placeholder="Écrivez ici"
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
                            <label class="px-2 text-xl" for="expiration_date">Temps d'expiration</label>
                            <br>
                            <select name="expiration_date" id="expiration_date"
                                class="px-2 py-2 m-auto my-2 ml-1.5 text-lg text-white rounded outline-none appearance-none font-outfit lg:py-1 lg:my-2 focus:outline-none"
                                style="background-color : #282828">
                                <option value="never" selected>Jamais</option>
                                <option value="1_hour">Une heure</option>
                                <option value="1_day">Un jour</option>
                                <option value="1_week">Une semaine</option>
                                <option value="1_month">Un mois</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="password_input" class="px-2 text-lg font-extrabold text-white font-outfit">Mot
                                de passe (Optionnel)
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
                            value="Créer">
                    </div>
                </div>
            </form>
        </main>
        <footer class="w-full pb-2 mt-8 md:mt-4">
            <div>
                <div class="ml-4 md:text-center md:ml-0">
                    <p><a href="https://github.com/Coroxx/PandoreNote" target="_blank" rel="noopener noreferrer">Github
                            -
                            2.0 par Corox</a></p>
                </div>
                <div class="float-right mr-4 -mt-6">

                    <p> <a href="{{ route('about') }}">En savoir
                            plus</a></p>
                </div>

            </div>
        </footer>
    </div>
</body>


</html>
