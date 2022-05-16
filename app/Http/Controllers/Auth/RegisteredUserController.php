<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\UserRegistPost;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRegistPost $request)
    {
        // プロフィール画像が選択されている場合
        if ($request->file('image'))
        {
        // ファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        //dd($file_name);
        // Storageファサードを使い、ファイルを別名で指定のディレクトリ"storage/app/public"に保存
        Storage::putFileAs('public',$request->file('image'), $file_name);

        // プロフィール画像を含む登録情報をDBに登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $file_name,
        ]);

        } else {

        // プロフィール画像を除く登録情報をDBに登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
