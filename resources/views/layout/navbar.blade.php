@php
    use Illuminate\Support\Facades\App;
@endphp

<nav class="navbar bg-light border-bottom">
    <div class="container justify-content-center">
        <div class="col-lg-5">
            <a class="ml-0 navbar-brand" href="{{ route('home') }}">
                <span class="fw-light">Secret</span><span class="fw-semibold">Notes</span>
            </a>
            <span class="navbar-text d-none d-md-inline">{{ __('navbar.text') }}</span>
        </div>
        <div class="col-3 d-none d-md-block">
            <ul class="nav float-end">
                <li class="nav-item text-end">
                    <a class="nav-link text-dark" href="{{ route('page.note.new') }}">
                        {{ __('navbar.new_note') }}
                    </a>
                </li>
                <li class="nav-item dropdown text-end">
                    <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Config::get('languages')[App::currentLocale()] }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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
        </div>
    </div>
</nav>
