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
                            Notes chiffrées et autodestructrices <img src="{{ asset('assets/lock.png') }}"
                                class="inline w-5 h-5 ml-1 -mt-1.5" alt="leaficon">
                        </h3>
                    </div>
                </div>
            </div>
        </header>
        <main class="text-center md:ml-4 md:text-left">
            @if (is_null($note))
                <div class="text-red-500 py-2 text-xl px-2 md:px-0 md:ml-2.5">
                    <p class="font-extrabold font-outfit"">
                        Désolé cette note n'existe pas, elle a déjà été lue ou sa date d'expiration est dépassée
                    </p>
                </div>
            @else
                <form action=" {{ route('note.decrypt', $note->slug ?? '') }}" method="POST">
                        @csrf
                    <div class="ml-2.5 mt-10">
                        @if ($password)
                            <h2 class="px-2 text-xl font-extrabold text-white font-outfit" md:px-0">Entrez le mot de
                                passe de
                                la
                                note</h2>
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
                            value="Déchiffrer" onclick="disableButton(this)">
                        <p class="px-2 mt-8 font-extrabold text-white font-outfit" md:px-0">Après avoir déchiffré cette
                            note, elle
                            sera
                            supprimée de
                            la
                            base
                            de donnée</p>

                    </div>
                    </form>
            @endif
        </main>
    </div>

    <script>
        function disableButton(e) {
            setTimeout(function() {
                e.disabled = true;
            }, (100));
        }
    </script>
</body>

</html>
