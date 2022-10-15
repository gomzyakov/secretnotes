@empty($hide_footer)
    <footer class="bg-light border-top">

        <div class="container">
            <div class="row py-2 py-md-4 justify-content-center">
                <div class="col-md-4 d-none d-md-block">
                    <a class="link-dark text-decoration-none footer-logo" href="{{ route('home') }}">
                        Secretic
                    </a>
                    <div class="text-secondary">
                        <small>v{{ config('app.version') }}</small>
                    </div>
{{--                    <a class="text-decoration-none"--}}
{{--                       href="https://github.com/gomzyakov"--}}
{{--                       target="_blank"--}}
{{--                       style="color: #aaa;">--}}
{{--                        Alexander Gomzyakov--}}
{{--                    </a>--}}
                </div>
                <div class="col-md-4">
                    <ul class="nav justify-content-md-end">
                        <li class="nav-item d-md-none">
                            <a href="{{ route('home') }}" class="nav-link ps-0 pe-2 px-md-2">
                                Secretic
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-block">
                            <a href="{{ route('home') }}" class="nav-link link-secondary ps-0 pe-2 px-md-2">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('page.note.new') }}" class="nav-link link-secondary px-2">
                                {{ __('navbar.new_note') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home').'#about' }}" class="nav-link link-secondary px-2">
                                About
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endempty

