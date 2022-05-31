<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'page' => 'int|min:1',
        ];
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        $page = (int) $this->get('page');

        return $page ?? 1;
    }
}
