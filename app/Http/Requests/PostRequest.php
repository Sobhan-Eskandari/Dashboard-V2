<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'selectedCategories' => 'required',
            'selectedTags' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'وارد کردن عنوان اجباری است',
            'body.required' => 'وارد کردن متن اجباری است',
            'selectedCategories.required' => 'انتخاب حداقل یک دسته بندی اجباری است',
            'selectedTags.required' => 'انتخاب حداقل یک برچسب اجباری است',
        ];
    }
}
