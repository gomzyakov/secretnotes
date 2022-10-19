<div class="container my-5">
    <div class="row pt-5 justify-content-center">
        <div class="col-9">
            <h2 class="h1 lh-sm fw-semibold">Frequently asked questions</h2>
        </div>
    </div>
    <div class="row my-4 py-2 pt-md-2 justify-content-center">
        <div class="col-9 mb-4">
            <h5 class="mb-2 fw-semibold">How are my secret notes stored?</h5>
            <p class="text-secondary mb-1">
                Your secret notes are always <a href="s">AES-256 encrypted</a> in our database, which means that even the site owner cannot read them!
            </p>
        </div>

        <div class="col-9 mb-4">
            <h5 class="mb-2 fw-semibold">Is it possible to know if a secret note has already been read?</h5>
            <p class="text-secondary mb-1">
                No, <a href="{{ route('home') }}">Secretic</a> does not store any information about opening a note.
            </p>
            <p class="text-secondary mb-1">
                Thus, it is <span class="fw-semibold">not possible to know</span> if the note already existed or if it was already open.
            </p>
        </div>

        <div class="col-9 mb-4">
            <h5 class="mb-2 fw-semibold">Does Secretic store only text notes?</h5>
            <p class="text-secondary mb-1">
                For now, yes. Updates coming soon to allow you to privately transfer images and other types of files!
            </p>
        </div>
    </div>
</div>
