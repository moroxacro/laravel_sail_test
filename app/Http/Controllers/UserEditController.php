<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegistPost;
use App\Models\User;
use App\Models\Post;

class UserEditController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        //dd($data);
        return view('account.edit', $data);
    }

    public function edit(Request $request)
    {

        // プロフィール画像が選択されている場合
        if ($request->file('image'))
        {
        // ファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // Storageファサードを使い、ファイルを別名で指定のディレクトリ"storage/app/public"に保存
        Storage::putFileAs('public',$request->file('image'), $file_name);

        // プロフィール画像を含むユーザー情報を更新する
        User::where('id', Auth::user()->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_image' => $file_name,
        ]);
        } else {
            User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        // 子テーブルの情報も同時に更新する
        Post::where('user_id', Auth::user()->id)
        ->update([
            'user_name' => $request->name,
        ]);

        return redirect(RouteServiceProvider::HOME);
    }
}
