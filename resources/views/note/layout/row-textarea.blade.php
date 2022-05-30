<div class="row mt-5">
    <div class="col-md-8 mx-auto">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                Успешно! Вот ссылка на заметку : {{ session('success') }}
            </div>
        @endif

        <label for="text" class="form-label h3">{{ __('home.title') }}</label>
        <textarea class="form-control"
                  name="text"
                  id="text"
                  placeholder="{{ __('home.placeholder') }}"
                  style="height: 160px"></textarea>

        @error('text')
        <div class="py-2 text-red-500">
            <p class="font-extrabold font-outfit">
                {{ $message }}
            </p>
        </div>
        @enderror

    </div>
</div>
