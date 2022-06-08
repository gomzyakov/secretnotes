<div class="row justify-content-center mt-4">
    <div class="col-4">
        <div class="form-floating">
            <select class="form-select" name="expiration_date" id="expiration_date"
                    aria-label="select example">
                <option selected>{{ __('note_create.expiration.never') }}</option>
                <option value="1_hour">{{ __('note_create.expiration.1_hour') }}</option>
                <option value="1_day">{{ __('note_create.expiration.1_day') }}</option>
                <option value="1_week">{{ __('note_create.expiration.1_week') }}</option>
                <option value="1_month">{{ __('note_create.expiration.1_month') }}</option>
            </select>
            <label for="expiration_date">{{ __('note_create.expiration.title') }}</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-floating">
            <input class="form-control"
                   name="encrypt_password"
                   id="password_input"
                   type="password"
                   placeholder="Password">
            <label for="password_input">{{ __('note_create.password_placeholder') }}</label>

            @error('encrypt_password')
            <div class="py-2 text-red-500">
                <p class="font-extrabold font-outfit">
                    {{ $message }}
                </p>
            </div>
            @enderror
        </div>
    </div>
</div>

