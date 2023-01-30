<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $name
 */
class TaskStatusStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:task_statuses|max:100',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('status.attributes.name'),
        ];
    }
}
