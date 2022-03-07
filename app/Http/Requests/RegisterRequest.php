<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->path() == 'register'){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastName' => 'required',
            'firstName' => 'required',
            'mail' => 'email:strict|email:dns',
        ];
    }

    public function messages()
    {
        return [
            'lastName.required' => '※姓を入力してください',
            'firstName.required' => '※名を入力してください',
            'mail.email' => '※入力が不正です。メールアドレスを正しく入力してください。',
        ];
    }
}
