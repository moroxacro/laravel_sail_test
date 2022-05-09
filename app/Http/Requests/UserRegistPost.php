<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistPost extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'name.max' => '名前は最大20文字まで入力できます',
            'email.required' => 'メールアドレスは必ず入力してください',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'email.max' => 'メールアドレスは最大255文字まで入力できます',
            'password.required' => 'パスワードは必ず入力してください',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.max' => 'パスワードは最大255文字まで入力できます',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                    // name は必須、最大20文字
            // email は必須、メールアドレスに沿っている、最大255文字
            // password は必須、8文字以上32文字以内
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:32'],
        ];
    }
}
