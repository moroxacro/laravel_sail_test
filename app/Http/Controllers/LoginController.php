<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('login', ['msg'=>'フォームを入力：']);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'name' => 'required',
            'mail' => 'email',
        ];
        $this->validate($request, $validate_rule);
        return view('login', ['msg'=>'正しく入力されました！']);
    }
}
