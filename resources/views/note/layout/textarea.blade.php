<div class="form-floating">
    <textarea class="form-control"
              name="text"
              id="text"
              placeholder="Напишите здесь"
              style="height: 160px"></textarea>
    <label for="floatingTextarea2">Напишите здесь</label>
</div>

@error('text')
<div class="py-2 text-red-500">
    <p class="font-extrabold font-outfit">
        {{ $message }}
    </p>
</div>
@enderror
