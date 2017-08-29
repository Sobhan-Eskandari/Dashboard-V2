<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'user_name' => 'required|unique:users,user_name,'.$this->admin,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->admin,
            'land_line' => 'required|digits:11',
            'mobile' => 'required|digits:11|unique:users,mobile,'.$this->admin,
            'address' => 'required',
            'zip' => 'required|digits:10',
            'password' => 'confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'وارد کردن نام کاربری اجباری است',
            'user_name.unique' => 'نام کاربری وارد شده قبلا در سیستم ثبت شده است',
            'first_name.required' => 'وارد کردن نام اجباری است',
            'last_name.required' => 'وارد کردن نام خانوادگی اجباری است',
            'email.required' => 'وارد کردن ایمیل اجباری است',
            'email.email' => 'ایمیل وارد شده معتبر نمی باشد',
            'email.unique' => 'ایمیل وارد شده قبلا در سیستم ثبت شده است',
            'land_line.required' => 'وارد کردن شماره تلفن اجباری است',
            'land_line.digits' => 'شماره تفلن باید 11 رقم باشد',
            'mobile.unique' => 'شماره موبایل وارد شده قبلا در سیستم ثبت شده است',
            'mobile.required' => 'وارد کردن شماره موبایل اجباری است',
            'mobile.digits' => 'شماره موبایل باید 11 رقم باشد',
            'address.required' => 'وارد کردن آدرس اجباری است',
            'zip.required' => 'وارد کردن کد پستی اجباری می باشد',
            'zip.digits' => 'کد پستی باید 10 رقم باشد',
            'password.confirmed' => 'تایید رمز عبور با رمز عبور وارده شده مطابقت ندارد',
            'password.min' => 'رمز عبور باید حداقل 8 کاراکتر باشد',
        ];
    }
}
