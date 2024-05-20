<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetByStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required'],
            'status.*' => ['string', Rule::in(['available', 'pending', 'sold'])]
        ];
    }
}
