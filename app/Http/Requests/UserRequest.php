<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:20',
            'email' => 'required|unique:users|max:30',
            'content' => 'nullable|max:40',
            'password' => 'required|min:6|max:15|confirmed',
        ];

        $update = [
            'name' => 'nullable|max:20',
            'content' => 'nullable|max:40',
            'company' => 'nullable|max:40',
            'location' => 'nullable|max:40',
            'phone' => 'nullable|max:30',
            'fax' => 'nullable|max:30',
            'mobile' => 'nullable|max:16',
            'github' => 'nullable|max:50',
            'Slack' => 'nullable|max:50',
            'facebook' => 'nullable|max:50',
            'qq' => 'nullable|max:16',
        ];

        if ($this->getMethod() == 'PATCH' or $this->getMethod() == 'PUT') {
            return $update;
        } else {
            return $create;
        }
    }
}
