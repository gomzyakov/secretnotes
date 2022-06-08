@extends('layout.app')

@section('title', trans('common.head_title'))

@section('content')

    <div class="container">

        <form id="create_note_form">
            @csrf

            @include('note.layout.row-textarea')

            <div class="row mt-2 mb-4">
                <div class="col-md-8 mx-auto">
                    <div id="textareaHelp" class="form-text">
                        {{ __('home.additional_settings.prefix') }} <a href="{{ route('page.note.new') }}">{{ __('home.additional_settings.link') }}</a>.
                    </div>
                </div>
            </div>

            <div class="row my-5 justify-content-center">
                <div class="col-8">
                    <div class="d-grid">
                        <button id="create_note_form__submit_btn" type="submit" class="btn btn-lg btn-primary">
                            {{ __('home.create_btn') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

    @include('home.layout.cases')

@endsection

@push('scripts')
    <script src="{{ asset('js/note/create.js')}}"></script>
@endpush
