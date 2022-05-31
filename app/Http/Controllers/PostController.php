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
use App\Models\Tag;
use App\Models\postTag;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }


    public function detail($user='noname', $id='zero')
    {
        // この投稿の最新の総いいね数を取得
        $likes_count = count(Like::where('post_id', $id)->get());
        
        if (Auth::check()) {
        // ログイン時
        // 現ユーザーがこの投稿にいいねをつけているかを判定
        $is_liked = Like::check_likes_duplicate(Auth::user()->id ,$id);

        $data = [
            'user' => User::where('name', $user)->get(),
            'post' => Post::with('tags')->find($id),
            'comments' => Comment::where('post_id', $id)->get(),
            'post_image' => PostImage::where('post_id', $id)->first(),
            'is_liked' => $is_liked,
            'likes_count' => $likes_count,
        ];

        } else {

            // 非ログイン時
            $data = [
                'user' => User::where('name', $user)->get(),
                'post' => Post::with('tags')->find($id),
                'comments' => Comment::where('post_id', $id)->get(),
                'post_image' => PostImage::where('post_id', $id)->first(),
                'likes_count' => $likes_count,
            ];
            
        }

        return view('post.detail', $data);
    }

    
    public function store(Request $request)
    {      
        // 投稿文をDBに登録
        $date_time = date("Ymd:His");
        
        Post::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'title' => $request->title,
            'post' => $request->message,
            'temporary_id' => $date_time,
        ]);

        // カテゴリーの値を全て取得
        $categories = explode(",", $request->category);
        $post_id = Post::where('temporary_id', $date_time)->first()->id;

        foreach ($categories as $category) {

            // タグ名が重複している場合
            if (Tag::check_tags_duplicate($category)) {
                
                $count = Tag::where('name', $category)->first()->count;
                $count += 1;

                Tag::where('name', $category)->update([
                    'count' => $count,
                ]);

                $tag_id = Tag::where('name', $category)->first()->id;

                postTag::create([
                    'post_id' => $post_id,
                    'tag_id' => $tag_id,
                ]);
                
            } else {
                // タグ名が重複していない場合
                $count = 1;
                $temporary_id = $category . date("Ymd:His");

                Tag::create([
                    'post_id' => $post_id,
                    'name' => $category,
                    'count' => $count,
                    'temporary_id' => $temporary_id,
                ]);

                $tag_id = Tag::where('temporary_id', $temporary_id)->first()->id;

                postTag::create([
                    'post_id' => $post_id,
                    'tag_id' => $tag_id,
                ]);

            }

        }

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', '投稿が完了しました');
    }
}
