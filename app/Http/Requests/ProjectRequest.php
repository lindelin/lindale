<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects|max:100',
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'type_id' => 'nullable|max:10',
            'sl_id' => 'nullable|integer',
            'password' => 'required|min:6|max:15|confirmed',
            'image' => 'nullable|image',
        ];

        $delete = [
            'password' => 'required',
        ];

        $update = [
            'start_at' => 'nullable|date|date_format:Y-m-d',
            'end_at' => 'nullable|date|after:start_at|date_format:Y-m-d',
            'type_id' => 'nullable|max:10',
            'status_id' => 'nullable|max:10',
            'sl_id' => 'nullable|integer',
            'password' => 'nullable|min:6|max:15|confirmed',
            'image' => 'nullable|image',
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
