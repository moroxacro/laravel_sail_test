<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\CheckLikesDeplicate;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function detail($user='noname', $id='zero')
    {
        //現ユーザーがこの投稿にいいねをつけているかを判定
        $CheckLikesDeplicate = new CheckLikesDeplicate;
        $is_liked = $CheckLikesDeplicate->check_likes_duplicate(Auth::user()->id ,$id);
        //dd($is_liked);

        //この投稿の最新の総いいね数を取得
        $likes_count = count(Like::where('post_id', $id)->get());

        $data = [
            'user' => User::where('name', $user)->get(),
            'post' => Post::find($id),
            'comments' => Comment::where('post_id', $id)->get(),
            'post_image' => PostImage::where('post_id', $id)->first(),
            'is_liked' => $is_liked,
            'likes_count' => $likes_count,
        ];
        //dd($data);
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
        $categories = null;
        $category_number = count($request->category);

        for($i = 0; $i < $category_number; $i++)
        {
            $categories .= "#" . $request->category[$i] . " ";
        }

        // 投稿文をDBに登録
        Post::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'title' => $request->title,
            'post' => $request->message,
            'category' => $categories,
        ]);

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', '投稿が完了しました');
    }
}
