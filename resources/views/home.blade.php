<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="PandoreNote, des notes chiffrées et autodestructrice">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/logo-full.png') }}" type="image/x-icon">
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
    }

    html {
        background-color: #1C1C1C;
    }


    body {
        background: rgb(28, 28, 28);
        background: linear-gradient(180deg, rgba(28, 28, 28, 1) 0%, rgba(40, 43, 43, 1) 89%);
    }



    .content {
        position: absolute;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    @keyframes float {
        0% {
            transform: translatey(0px);
        }

        50% {
            transform: translatey(-10px);
        }

        100% {
            transform: translatey(0px);
        }
    }

    @keyframes float-menu-right {
        0% {
            left: 0rem;
        }

        100% {
            left: 11rem;
        }
    }

    @keyframes float-menu-left {
        0% {
            left: 11rem;
        }

        100% {
            left: 0rem;
        }
    }

    .float-1 {
        animation: float 4s ease-in-out infinite;
    }

    .float-2 {
        animation: float 3s ease-in-out infinite;
    }

    .float-menu-to-right {
        animation: float-menu-right 0.5s ease-in-out 1;
        animation-fill-mode: forwards;
    }

    .float-menu-to-left {
        animation: float-menu-left 0.5s ease-in-out 1;
        animation-fill-mode: forwards;
    }

</style>




<body class="overflow-hidden text-white select-none fadeIn">
    <div id="menu" class="absolute left-0 hidden h-screen font-extrabold font-outfit w-44">
        <div class="w-full h-screen font-extrabold text-center font-outfit">
            <h2 class="ml-8 text-3xl mt-36">
                <a href="{{ route('new.note') }}">Créer une note</a>
            </h2>
            <h4 class="ml-8 text-xl mt-36">
                <a href="{{ route('about') }}">À propos de PandoreNote</a>
            </h4>
            <h4 class="ml-8 text-xl mt-36">
                <a href="https://github.com/Coroxx/PandoreNote" target="_blank" rel="noopener noreferrer">Github -
                    2.0</a>
            </h4>

        </div>
    </div>
    <div id="container" class="absolute w-full h-screen">

        <header class="relative mt-4">
            <svg id="button" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 ml-4 -mt-2 toggle md:w-14 md:h-14"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path id="button-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </header>
        <main class="text-white">
            <div class="relative w-full m-auto mt-8 md:mt-20 lg:w-7/12 md:w-9/12">
                <div class="ml-4 md:ml-0">
                    <img src="{{ asset('assets/bloc.png') }}" class="relative w-24 float-2 lg:w-32 md:w-28" alt=""
                        style="z-index :30;">
                </div>
                <img src="{{ asset('assets/cube-1.png') }}" class="absolute z-20 float-1 md:w-32 w-28 top-12 right-4 "
                    alt="">
            </div>
            <div class="relative w-full md:-mt-12 -ml-14 md:ml-0 md:w-8/12 lg:w-9/12 lg:m-auto">
                <img src="{{ asset('assets/iphone.png') }}" class="w-96" alt="">
                <img src="{{ asset('assets/rond.png') }}"
                    class="absolute z-20 w-24 float-1 sm:left-40 left-36 bottom-14" alt="">
            </div>
            <div class="w-1/2 md:w-1/3 content left-3/4 top-3/4">
                <div class="relative w-full">
                    <img src="{{ asset('assets/mac.png') }}" class="z-20 ml-auto">
                    <img src="{{ asset('assets/cube-2.png') }}" class="absolute bottom-0 z-40 w-1/3 float-2 right-12">
                </div>
            </div>

            <div class="content md:left-1/2 left-2/3 md:top-1/2 top-5/12">
                <a href="{{ route('new.note') }}">
                    <img src="{{ asset('assets/logo.png') }}" class="z-0 lg:w-44 md:w-40 w-36" alt=""
                        class="m-auto">
                </a>
            </div>
        </main>


        <script>
            let button = document.getElementById('button')
            let div = document.getElementById('menu')
            let container = document.getElementById('container')

            function fadeIn(e) {
                e.classList.remove('animate__animated', 'animate__bounceOutLeft')
                e.classList.add('animate__bounceInLeft', 'animate__animated')
            }


            function fadeOut(e) {
                e.classList.remove('animate__animated', 'animate__bounceInLeft')
                e.classList.add('animate__bounceOutLeft', 'animate__animated')
            }

            button.addEventListener('click', function() {
                if (div.classList.contains('animate__bounceInLeft')) {
                    // Fermeture du menu
                    fadeOut(div)

                    button.innerHTML = `
                    <path id="button-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />`

                    container.classList.remove('float-menu-to-right')
                    container.classList.add('float-menu-to-left')
                    div.classList.add('fadeOut')
                } else {
                    // Ouverture du menu
                    fadeIn(div)
                    div.classList.remove('hidden', 'fadeOut')
                    div.classList.add('fadeIn')
                    container.classList.remove('float-menu-to-left')
                    container.classList.add('float-menu-to-right')

                    button.innerHTML = `
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />`

                }
            })
        </script>
    </div>
</body>
