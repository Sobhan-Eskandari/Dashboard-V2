<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendRequest extends FormRequest
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
            'site_name' => 'required',
            'address' => 'required|unique:friends,address,'.$this->friend,
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => 'وارد کردن نام سایت الزامی است',
            'address.required' => 'وارد کردن آدرس سایت الزامی است',
            'address.unique' => 'سایت وارد شده تکراری می باشد',
        ];
    }
}
