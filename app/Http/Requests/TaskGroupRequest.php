<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskGroupRequest extends FormRequest
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
            'title' => 'required|max:100',
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'type_id' => 'required|integer',
            'status_id' => 'required|integer',
            'color_id' => 'required|integer',
        ];

        $delete = [];

        $update = [
            'title' => 'required|max:100',
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'type_id' => 'required|integer',
            'status_id' => 'required|integer',
            'color_id' => 'required|integer',
        ];

        if ($this->getMethod() == 'DELETE') {
            return $delete;
        } elseif ($this->getMethod() == 'PATCH') {
            return $update;
        } else {
            return $create;
        }
    }
}
