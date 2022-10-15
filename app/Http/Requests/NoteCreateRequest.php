<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteCreateRequest extends FormRequest
{
    public const FIELD_TEXT = 'text';

    public const FIELD_PASSWORD = 'encrypt_password';

    public const FIELD_EXPIRATION_DATE = 'expiration_date';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            self::FIELD_TEXT            => 'string|required|max:20000',
            self::FIELD_PASSWORD        => 'string|min:6|max:100|nullable',
            self::FIELD_EXPIRATION_DATE => 'string|nullable',
        ];
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->get(self::FIELD_TEXT);
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->get(self::FIELD_PASSWORD) && strlen($this->get(self::FIELD_PASSWORD))
            ? $this->get(self::FIELD_PASSWORD)
            : null;
    }

    /**
     * @return string|null
     */
    public function getExpirationDate(): ?string
    {
        // TODO Move `1_hour` to reference
        return in_array($this->get(self::FIELD_EXPIRATION_DATE), ['1_hour', '1_day', '1_week', '1_month'])
            ? $this->get(self::FIELD_EXPIRATION_DATE)
            : null;
    }
}
