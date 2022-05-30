@php
use Illuminate\Support\Facades\App;
    $active_navbar_item = $active_navbar_item?? null;
@endphp

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="40" src="{{ asset('assets/logo.png') }}">
            <span class="fs-4">SecretNotes</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ $active_navbar_item === 'home' ? 'active' : '' }}" aria-current="page">
                    {{ __('navbar.home') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('new.note') }}" class="nav-link {{ $active_navbar_item === 'new.note' ? 'active' : '' }}">
                    {{ __('navbar.new_note') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link {{ $active_navbar_item === 'about' ? 'active' : '' }}">
                    {{ __('navbar.about') }}
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Config::get('languages')[App::currentLocale()] }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::currentLocale())
                            <li>
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                    {{ $language }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

        </ul>
    </header>
</div>
