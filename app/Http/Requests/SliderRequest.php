<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'caption' => 'required',
            'indexPhoto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'caption.required' => 'وارد کردن متن اسلاید الزامی است',
            'indexPhoto.required' => 'انتخاب تصویر اسلاید الزامی است'
        ];
    }
}
