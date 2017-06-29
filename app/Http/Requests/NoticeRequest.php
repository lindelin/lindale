<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
        return [
            'title' => 'required|max:100',
            'content' => 'required',
            'start_at' => 'required|date|date_format:Y-m-d',
            'end_at' => 'required|date|after:start_at|date_format:Y-m-d',
            'type_id' => 'required|max:10',
        ];
    }
}
