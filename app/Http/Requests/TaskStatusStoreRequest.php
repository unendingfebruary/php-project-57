<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $name
 */
class TaskStatusStoreRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:task_statuses|max:100',
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.unique' => __('validation.custom.task-status.name.unique'),
        ];
    }
}
