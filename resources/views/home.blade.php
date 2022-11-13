@extends('layout.app')

@section('title', 'Create secret notes that will self-destruct after being read')

@section('content')

    <div class="container">

        <form action="{{ route('note.create') }}" method="POST" id="create_note_form">
            @csrf

            <div class="row mt-5">
                <div class="col-md-6 mx-auto">

                    <div class="text-center">
                        <label for="text" class="lh-sm fw-semibold form-label h1 mb-4">New secret note</label>
                    </div>

                    <textarea class="form-control"
                              name="text"
                              id="text"
                              placeholder="Write your note here..."
                              style="height: 160px"></textarea>

                </div>
            </div>

            <div class="row mt-2 mb-4">
                <div class="col-md-6 mx-auto">
                    <div id="textareaHelp" class="form-text">
                        You can create a secret note with <a href="{{ route('page.note.new') }}">additional settings</a>.
                    </div>
                </div>
            </div>

            <div class="row my-5 justify-content-center">
                <div class="col-6">
                    <div class="d-grid">
                        <button id="create_note_form__submit_btn" type="submit" class="btn btn-lg btn-primary">
                            Create note
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

    @include('home.cases')
    @include('home.why')
    @include('home.faq')

@endsection

@push('scripts')
    <script src="{{ asset('js/note/create.js')}}"></script>

    {{-- Disable submit button if note is empty --}}
    <script>
        $(document).ready(function(){
            $('#create_note_form__submit_btn').prop('disabled',true);
            $('#text').keyup(function(){
                $('#create_note_form__submit_btn').prop('disabled', this.value == "" ? true : false);
            })
        });
    </script>
@endpush
