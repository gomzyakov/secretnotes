@php
    use Illuminate\Support\Facades\App;
@endphp

<nav class="navbar bg-light border-bottom">
    <div class="container justify-content-center">
        <div class="col-lg-6">
            <a class="ml-0 navbar-brand" href="{{ route('home') }}">
                Secretic
            </a>
            <span class="navbar-text d-none d-md-inline">Secret notes that will self-destruct after being read.</span>
        </div>
        <div class="col-3 d-none d-md-block">
            <ul class="nav float-end">
{{--                <li class="nav-item text-end">--}}
{{--                    <a class="nav-link text-dark" href="{{ route('page.note.new') }}">--}}
{{--                        New note--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item dropdown text-end">
                    <a href="{{ route('page.note.new') }}" class="btn btn-outline-success" type="submit">New note</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
