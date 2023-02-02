<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $name
 * @property-read string $description
 */
class LabelStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:labels|max:100',
            'description' => 'nullable|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('label.attributes.name'),
        ];
    }
}
