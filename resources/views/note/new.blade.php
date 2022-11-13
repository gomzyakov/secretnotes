@extends('layout.app')

@section('title', 'Create secret note that will self-destruct after being read')

@section('content')

    <div class="container">

        <form action="{{ route('note.create') }}" method="POST" id="create_note_form">
            @csrf

            <div class="row mt-4 mt-lg-5">
                <div class="col-md-8 mx-auto">

                    <label for="text" class="lh-sm fw-semibold form-label h2 mb-4">New secret note</label>
                    <textarea class="form-control"
                              name="text"
                              id="text"
                              placeholder="Write your note here..."
                              style="height: 160px"></textarea>

                </div>
            </div>

            @include('note.layout.row-params')

            <div class="row my-5 justify-content-center">
                <div class="col-8">
                    <div class="d-grid">
                        <button id="create_note_form__submit_btn" type="submit" class="btn btn-lg btn-primary">
                            Create note
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

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
