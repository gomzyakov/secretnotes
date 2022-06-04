@php
    use Illuminate\Support\Facades\App;
@endphp



<nav class="navbar bg-light">
    <div class="container justify-content-center">
        <div class="col-5">
            <a class="navbar-brand" href="#" style="margin-right: 8px;">
                <img width="32" height="32" src="{{ asset('assets/logo.png') }}">
            </a>
            <a class="ml-0 navbar-brand" href="#">SecretNotes</a>
            <span class="navbar-text">Navbar text with an inline element</span>
        </div>
        <div class="col-3">
            <ul class="nav float-end">
                <li class="nav-item text-end">
                    <a class="nav-link text-dark" href="#">Link</a>
                </li>
                <li class="nav-item dropdown text-end">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img class="bi me-2" width="40" height="40" src="{{ asset('assets/logo.png') }}">
            <span class="fs-4">SecretNotes</span>
        </a>

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('page.note.new') }}"
                   class="nav-link ">
                    {{ __('navbar.new_note') }}
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
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
