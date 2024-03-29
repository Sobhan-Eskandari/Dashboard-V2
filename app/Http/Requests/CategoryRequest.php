<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name,'.$this->category,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن دسته بندی الزامی است',
            'name.unique' => 'دسته بندی وارد شده تکراری می باشد',
        ];
    }
}
