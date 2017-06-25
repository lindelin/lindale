<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $create = [
            'group_id' => 'nullable|integer',
            'title' => 'required|max:100',
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'cost' => 'nullable|integer|max:100000000000',
            'type_id' => 'required|integer',
            'user_id' => 'nullable|integer',
            'status_id' => 'required|integer',
            'priority_id' => 'required|integer',
            'color_id' => 'required|integer',
            'task_id' => 'nullable|integer',
        ];

        $update = [
            'group_id' => 'nullable|integer',
            'title' => 'nullable|max:100',
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'cost' => 'nullable|integer|max:100000000000',
            'spend' => 'nullable|integer|max:100000000000',
            'type_id' => 'nullable|integer',
            'user_id' => 'nullable|integer',
            'status_id' => 'nullable|integer',
            'priority_id' => 'nullable|integer',
            'color_id' => 'nullable|integer',
            'task_id' => 'nullable|integer',
        ];

        if ($this->getMethod() == 'PATCH') {
            return $update;
        } else {
            return $create;
        }
    }
}
