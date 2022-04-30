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
                            Notes chiffrées et autodestructrices <img src="{{ asset('assets/lock.png') }}"
                                class="inline w-5 h-5 ml-1 -mt-1.5" alt="leaficon">
                        </h3>
                    </div>


                    <div class="mt-12">
                        <span class="text-2xl font-extrabold font-outfit">Comment sont stockées mes notes ?</span>
                        <p class="mt-4 font-outfit"">Vos notes sont systématiquement chiffrées avec AES-256 au
                            sein
                            de notre
                            base de données, ce qui signifie que même l'auteur du site ne peut pas les lire !
                            <br>
                            NB : Ce chiffrement est <span class="font-extrabold  font-outfit"">utilisé par le
                            gouvernement des
                            États-Unis</span> <a rel="noopener noreferrer"
                                href="https://fr.wikipedia.org/wiki/Advanced_Encryption_Standard" target="_blank"
                                rel="no" class="underline">Source</a>
                        </p>
                    </div>
                    <div class="mt-12">
                        <span class="text-2xl font-extrabold font-outfit"">Est-il possible de savoir si une note a déjà été ouverte
                            ?</span>
                        <p class="pr-2 mt-4  font-outfit">Et bien non, contrairement aux autres alternatives,
                            PandoreNote ne stocke aucune information sur l'ouverture d'une note.
                            <br>
                            NB : Il n'est donc <span class="font-extrabold font-outfit""> pas
                                possible de savoir si une note a déjà existée </span> ou si elle a déjà été ouverte.
                            </p>

                    </div>
                    <div class="mt-12 ">
                                <span class="text-2xl font-extrabold font-outfit"">PandoreNote peut-il ne stocker que des notes ? </span>
                        <p class="pr-2 mt-4  font-outfit">Des mises à jour arrivent bientôt, notamment pour
                                    partager des images une seule fois !
                                    <br>
                                    NB : Il est probable qu'une <span class="font-extrabold font-outfit"">application mobile </span>sorte.
                        </p>
                    </div>
                </div>
            </div>
        </header>
    </div>
</body>

</html>
