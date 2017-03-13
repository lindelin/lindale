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
            'group_id' => 'integer',
            'title' => 'required|max:100',
            'start_at' => 'date|date_format:Y-m-d',
            'end_at' => 'date|after:start_at|date_format:Y-m-d',
            'cost' => 'integer|max:100000000000',
            'type_id' => 'required|integer',
            'user_id' => 'integer',
            'status_id' => 'required|integer',
            'priority_id' => 'required|integer',
            'color_id' => 'required|integer',
            'task_id' => 'integer',
        ];

        $update = [
            'group_id' => 'integer',
            'title' => 'max:100',
            'start_at' => 'date|date_format:Y-m-d',
            'end_at' => 'date|after:start_at|date_format:Y-m-d',
            'cost' => 'integer|max:100000000000',
            'type_id' => 'integer',
            'user_id' => 'integer',
            'status_id' => 'integer',
            'priority_id' => 'integer',
            'color_id' => 'integer',
            'task_id' => 'integer',
        ];

        if ($this->getMethod() == 'PATCH') {
            return $update;
        } else {
            return $create;
        }
    }
}
