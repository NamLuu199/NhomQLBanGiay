<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
                    'position' => 'required|max:255',
                    'new_image' => 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:10000',
                    'stock' => 'required|not_in:0',
                    'filename.*'=> 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'category_id' => 'required|not_in:0',
                    'vendor_id' => 'required|not_in:0',
                    'brand_id' => 'required|not_in:0',
                    'price' => 'required'
                ];
                break;
            case 'PUT':
                return[];
            case 'PATCH':
                return [
                    'name' => 'required|max:255|unique:categories,id'.$this->get('id'),
                    'position' => 'required|max:255',
                    'new_image' => 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:10000',
                    'stock' => 'required|not_in:0',
                    'filename.*'=> 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:10000',
                    'category_id' => 'required|not_in:0',
                    'vendor_id' => 'required|not_in:0',
                    'brand_id' => 'required|not_in:0',
                    'price' => 'required'
                ];
                break;
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'name.max' => 'Độ dài không quá 255 ký tự',
            'name.unique' => 'Sản phẩm này đã tồn tại',
            'position.required' => 'Vị trí không được bỏ trống',
            'image.image' => 'Chỉ nhận định dạng: jpeg,webp,png,jpg,gif,svg ',
            'image.max' => 'Kích thước tối đa 10000kb',
            'new_image.image' => 'Chỉ nhận định dạng: jpeg,webp,png,jpg,gif,svg ',
            'new_image.max' => 'Kích thước tối đa 10000kb',
            'filename.*.image' => 'Chỉ nhận định dạng: jpeg,webp,png,jpg,gif,svg ',
            'filename.*.max' => 'Kích thước tối đa 10000kb',
            'stock.required' => 'Số lượng không được bỏ trống',
            'category_id.not_in' => 'Danh mục không được bỏ trống',
            'brand_id.not_in' => 'Hãng không được bỏ trống',
            'vendor_id.not_in' => 'Nhà cung cấp không được bỏ trống',
            'price.required' => 'Giá không được bỏ trống'
        ];
    }
}
