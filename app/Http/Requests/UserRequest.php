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
        $create =  [
            'name' => 'required|max:20',
            'email' => 'required|unique:users|max:30',
            'content' => 'max:40',
            'password' => 'required|min:6|max:15|confirmed',
        ];

        $update =  [
            'name' => 'max:20',
            'content' => 'max:40',
            'company' => 'max:40',
            'location' => 'max:40',
            'phone' => 'max:30',
            'fax' => 'max:30',
            'mobile' => 'max:16',
            'github' => 'max:50',
            'Slack' => 'max:50',
            'facebook' => 'max:50',
            'qq' => 'max:16',
        ];

        if ($this->getMethod() == 'PATCH') {
            return $update;
        } else {
            return $create;
        }
    }
}
