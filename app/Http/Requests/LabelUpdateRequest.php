<?php

namespace App\Http\Requests;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read string $name
 * @property-read string $description
 */
class LabelUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        /** @var Label $label */
        $label = $this->route('label');

        return [
            'name' => [
                'required',
                Rule::unique('labels')->ignore($label->id),
                'max:100'
            ],
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
