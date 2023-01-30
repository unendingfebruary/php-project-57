<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read string $name
 * @property-read string $description
 * @property-read string $status_id
 * @property-read string $assigned_to_id
 */
class TaskUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        /** @var Task $task */
        $task = $this->route('task');

        return [
            'name' => [
                'required',
                Rule::unique('tasks')->ignore($task->id),
                'max:255'
            ],
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
