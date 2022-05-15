<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function detail($user='noname', $id='zero')
    {
        $data = [
            'user' => User::find($user),
            'post' => Post::find($id),
            'post_image' => PostImage::where('post_id', $id)->first(),
        ];
        return view('post.detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        // カテゴリーの値を全て取得し、句読点で連結する 
        $categories = "#";
        $category_number = count($request->category);
        //dd($request->category[0]);
        //dd($category_number);

        for($i = 0; $i < $category_number; $i++)
        {
            $categories .= $request->category[$i] . " ";
        }

        // 投稿文をDBに登録
        Post::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'title' => $request->title,
            'post' => $request->message,
            'category' => $categories,
        ]);

        if ($request->file('image'))
        {
        // ファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // 
        // Storageファサードを使い、ファイルを別名で指定のディレクトリ"storage/app/public"に保存
        Storage::putFileAs('public',$request->file('image'), $file_name);
        //$request->file('image')->storeAs('public',$file_name);

        // 投稿画像をDBに登録
        $Post = Post::where('title', $request->title)->first();
        PostImage::create([
            'post_id' => $Post->id,
            'image' => $file_name,
        ]);
        }


        return redirect()->intended(RouteServiceProvider::HOME)->with('success', '投稿が完了しました');
    }
}
