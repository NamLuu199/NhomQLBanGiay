<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.max' => 'Độ dài không quá 255 ký tự'
        ];
    }
}
