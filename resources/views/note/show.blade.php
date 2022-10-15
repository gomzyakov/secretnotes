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

            </div>
        </div>
    </div>
@endsection

