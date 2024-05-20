<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    private StoreRequest $storeRequest;
    function __construct()
    {
        $this->storeRequest = new StoreRequest();
    }

    public function validationData(): array
    {
        $id = request()->route('id');
        return array_merge($this->all(), ['id' => $id]);
    }
    public function rules(): array
    {
        return array_merge($this->storeRequest->rules(), [
            'id' => ['required', 'integer'],
        ]);
    }
}
