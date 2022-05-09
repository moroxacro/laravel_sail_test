<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin');
    }

    public function register(UserRegistPost $request)
    {

        // 送信されたリクエストは正しい

        // バリデーション済みデータの取得
        $validated = $request->validated();

        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::insert('insert into users (name, email, password, created_at, updated_at) values (:name, :email, :password, :created_at, :updated_at)', $param);

        return view('complete');
    }

    public function complete(Request $request)
    {
        return view('complete');
    }
}
