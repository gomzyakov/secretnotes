@extends('layout.app')

@section('title', 'Secret note read and destroyed!')

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-8 mx-auto">
                <h3 class="mt-5">Note contents</h3>

                <div class="alert alert-warning mt-3" role="alert">
                    This note was destroyed. If you need to keep it, copy it before closing this window.
                </div>

                <div class="mb-3">
                    <textarea class="form-control" id="note-text" rows="8">{{ $note_text }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="d-grid">
                        <button id="copy-button" type="button" class="btn btn-outline-secondary">
                            Copy note
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#copy-button').click(function (e) {
                e.preventDefault();

                var note_text = document.getElementById("note-text");
                var copy_btn = document.getElementById("copy-button");

                /* Select the text field */
                note_text.select();
                note_text.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(note_text.value);

                note_text.classList.add("is-valid");
                copy_btn.innerText = 'Copied!';
            });
        });
    </script>
@endpush