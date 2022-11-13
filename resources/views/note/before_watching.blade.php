@extends('layout.app')

@section('title', 'Read and destroy?')

@php
    use App\Models\Note;
    /** @var Note $note */
@endphp

@section('content')

    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-8 mx-auto">

                @if ($note === null)
                    <div class="alert alert-danger mt-5" role="alert">
                        Secret note does not exist, has already been read, or has expired
                    </div>
                @else
                    <h3 class="mt-5">Read and destroy?</h3>
                    <p>You're about to read and destroy the note with id <strong>{{ $note->slug }}</strong>.</p>
                    <form action="{{ route('note.decrypt', $note->slug) }}" method="POST">
                        @csrf
                        @if ($note->password)

                            <div class="my-3">
                                <input type="password"
                                       class="form-control"
                                       name="decrypt_password"
                                       placeholder="Enter password for the note"
                                       required>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                        @endif
                        <input class="btn btn-primary"
                               type="submit"
                               value="Yes, show me the note"
                               onclick="disableButton(this)">
                        <button type="button" class="btn btn-outline-secondary" disabled>No, not now</button>

                    </form>
                @endif

            </div>
        </div>
    </div>
@endsection



