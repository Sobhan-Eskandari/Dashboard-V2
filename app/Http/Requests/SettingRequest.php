<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'site_title' => 'required',
            'email' => 'required|email',
            'land_line' => 'required',
            'land_line2' => 'required',
            'mobile_number' => 'required',
            'mobile_number2' => 'required',
            'zip' => 'required',
        ];
    }
}
