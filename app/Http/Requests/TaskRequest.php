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
            'group_id' => 'integer|max:10',
            'title' => 'required|max:100',
            'start_at' => 'date|date_format:Y-m-d',
            'end_at' => 'date|after:start_at|date_format:Y-m-d',
            'cost' => 'integer|max:10',
            'type_id' => 'required|integer|max:10',
            'user_id' => 'integer|max:10',
            'status_id' => 'required|integer|max:10',
            'priority_id' => 'required|integer|max:10',
            'color_id' => 'required|integer|max:10',
            'task_id' => 'integer|max:10',
        ];

        return $create;
    }
}
