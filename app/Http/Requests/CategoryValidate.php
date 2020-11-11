<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidate extends FormRequest
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
        switch ($this->method())
        {
            case 'POST' :
                return [
                    'name' => 'required|max:255|unique:categories',
                    'position' => 'required|max:255'
                ];
                break;
            case 'PUT':
                return[];
            case 'PATCH':
                return [
                'name' => 'required|max:255|unique:categories,id'.$this->get('id'),
                'position' => 'required|max:255'
                ];
                 break;
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'name.unique' => 'Tên đã tồn tại',
            'name.max' => 'Độ dài không quá 255 ký tự',
            'position.required' => 'Vị trí không được bỏ trống'
        ];
    }
}
