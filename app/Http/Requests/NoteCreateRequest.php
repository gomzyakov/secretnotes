<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LogicException;

class NoteCreateRequest extends FormRequest
{
    final public const FIELD_TEXT = 'text';

    final public const FIELD_PASSWORD = 'encrypt_password';

    final public const FIELD_EXPIRATION_DATE = 'expiration_date';

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

    public function getText(): string
    {
        if (! is_string($this->get(self::FIELD_TEXT))) {
            throw new LogicException('Field `text` not string');
        }

        return $this->get(self::FIELD_TEXT);
    }

    public function getPassword(): ?string
    {
        if ($this->get(self::FIELD_PASSWORD) === null) {
            return null;
        }

        if (! is_string($this->get(self::FIELD_PASSWORD))) {
            throw new LogicException('Field `password` not string');
        }

        return $this->get(self::FIELD_PASSWORD);
    }

    public function getExpirationDate(): ?string
    {
        if ($this->get(self::FIELD_EXPIRATION_DATE) === null) {
            return null;
        }

        if (! is_string($this->get(self::FIELD_EXPIRATION_DATE))) {
            throw new LogicException('Field `expiration_date` not string');
        }

        // TODO Move `1_hour` to reference
        return in_array($this->get(self::FIELD_EXPIRATION_DATE), ['1_hour', '1_day', '1_week', '1_month'])
            ? $this->get(self::FIELD_EXPIRATION_DATE)
            : null;
    }
}
