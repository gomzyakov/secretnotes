@empty($hide_footer)
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-6 d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                <a href="/" class=" link-dark text-decoration-none">
                    <img class="bi me-2" width="32" height="32" src="{{ asset('assets/logo.png') }}">
                </a>
                <a class="col-md-4 mb-0 text-muted" href="{{ route('home') }}">© 2022 SecretNotes</a>
            </div>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>


            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"
                       aria-current="page">
                        {{ __('navbar.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('page.note.new') }}"
                       class="nav-link">
                        {{ __('navbar.new_note') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link">
                        {{ __('navbar.about') }}
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
        </footer>
    </div>
@endempty

