@extends('layout.app')

@section('title', trans('common.head_title'))

@section('content')

    <div class="container">

        <form id="create_note_form" method="POST">
            @csrf

            <div class="row mt-4 mt-lg-5">
                <div class="col-md-8 mx-auto">

                    <label for="text" class="lh-sm fw-semibold form-label h2 mb-4">New note</label>
                    <textarea class="form-control"
                              name="text"
                              id="text"
                              placeholder="{{ __('home.placeholder') }}"
                              style="height: 160px"></textarea>

                </div>
            </div>

            @include('note.layout.row-params')

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

@endsection

@push('scripts')
    <script src="{{ asset('js/note/create.js')}}"></script>
@endpush
