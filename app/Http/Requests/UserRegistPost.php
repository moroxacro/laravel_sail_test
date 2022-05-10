<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

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
            'password.confirmed' => '確認用のパスワードと一致していません',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.mixed' => 'パスワードに少なくとも1つの大文字と1つの小文字が必要です',
            'password.letters' => 'パスワードには少なくとも1文字が必要です',
            'password.numbers' => 'パスワードには少なくとも1つの番号が必要です',
            'password.symbols' => 'パスワードには少なくとも1つの記号が必要です',            
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
            // name は必須、最大255文字
            // email は必須、メールアドレスに沿っている、最大255文字
            // password は必須、デフォルトのルールを適用
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}
