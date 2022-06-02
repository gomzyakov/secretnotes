<div class="row justify-content-center mt-4">
    <div class="col-4">
        <div class="form-floating">
            <select class="form-select" name="expiration_date" id="expiration_date"
                    aria-label="select example">
                <option selected>Никогда</option>
                <option value="1_hour">Один час</option>
                <option value="1_day">Один день</option>
                <option value="1_week">Одна неделя</option>
                <option value="1_month">Один месяц</option>
            </select>
            <label for="expiration_date">Срок годности</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-floating">
            <input class="form-control"
                   name="encrypt_password"
                   id="password_input"
                   type="password"
                   placeholder="Password">
            <label for="password_input">Пароль (необязательно)</label>

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

