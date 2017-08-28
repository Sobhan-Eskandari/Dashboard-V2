<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutboxRequest extends FormRequest
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
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'ایمیل وارد شده معتبر نمی باشد',
            'email.required' => 'وارد کردن ایمیل الزامی می باشد',
            'subject.required' => 'وارد کردن موضوع الزامی می باشد',
            'message.required' => 'وارد کردن متن پیام الزامی می باشد',
        ];
    }
}
