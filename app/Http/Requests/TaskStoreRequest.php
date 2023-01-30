<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $name
 * @property-read string $description
 * @property-read string $status_id
 * @property-read string $assigned_to_id
 */
class TaskStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:tasks|max:255',
            'description' => 'nullable|max:500',
            'status_id' => 'required',
            'assigned_to_id' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('task.attributes.name'),
        ];
    }
}
