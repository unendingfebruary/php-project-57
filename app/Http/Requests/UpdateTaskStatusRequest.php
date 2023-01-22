<?php

namespace App\Http\Requests;

use App\Models\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property-read string $name
 */
class UpdateTaskStatusRequest extends FormRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        /** @var TaskStatus $status */
        $status = $this->route('task_status');

        return [
            'name' => [
                'required',
                Rule::unique('task_statuses')->ignore($status->id),
                'max:100'
            ],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.unique' => 'Статус с таким именем уже существует.',
        ];
    }
}
