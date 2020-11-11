<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidate extends FormRequest
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
                    'title' => 'required|max:255|unique:categories',
                    'position' => 'required|max:255',
                    'new_image' => 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
                ];
                break;
            case 'PUT':
                return[];
            case 'PATCH':
                return [
                    'title' => 'required|max:255|unique:categories,id'.$this->get('id'),
                    'position' => 'required|max:255',
                    'new_image' => 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
                ];
                break;
        }
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.max' => 'Độ dài không quá 255 ký tự',
            'title.unique' => 'Tên đã tồn tại',
            'position.required' => 'Vị trí không được bỏ trống',
            'image.image' => 'Chỉ nhận định dạng: jpeg,webp,png,jpg,gif,svg ',
            'image.max' => 'Kích thước tối đa 10000kb',
            'new_image.image' => 'Chỉ nhận định dạng: jpeg,webp,png,jpg,gif,svg ',
            'new_image.max' => 'Kích thước tối đa 10000kb'
        ];
    }
}
