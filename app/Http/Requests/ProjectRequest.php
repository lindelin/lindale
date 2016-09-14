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
            'start_at' => 'date|date_format:Y-m-d',
            'end_at' => 'date|after:start_at|date_format:Y-m-d',
            'type_id' => 'required|integer|max:10',
            'sl_id' => 'max:10',
            'password' => 'required|min:6|max:15|confirmed',
        ];

        $delete = [
            'password' => 'required',
        ];

        $update = [
            'title' => 'required|unique:projects,title,'.$this->route('project').'|max:100',
            'start_at' => 'date|date_format:Y-m-d',
            'end_at' => 'date|after:start_at|date_format:Y-m-d',
            'type_id' => 'required|integer|max:10',
            'status_id' => 'required|integer|max:10',
            'sl_id' => 'integer|max:10',
            'password' => 'min:6|max:15|confirmed',
            'project-pass' => 'required',
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
