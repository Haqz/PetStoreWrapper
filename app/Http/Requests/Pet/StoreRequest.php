<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category' => ['nullable', 'array'],
            'category.name' => ['nullable', 'string'],
            'name' => ['required', 'string'],
            'photoUrls' => ['required', 'array'],
            'photoUrls.*' => ['required', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*.name' => ['nullable', 'string'],
            'status' => ['nullable', 'string', Rule::in(['available', 'pending', 'sold'])]
        ];
    }
}
