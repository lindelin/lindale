<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|max:100',
            'color_id' => 'nullable|max:100',
        ];

        if ($this->getMethod() == 'PATCH' or $this->getMethod() == 'PUT') {
            return [];
        } else {
            return $create;
        }
    }
}
