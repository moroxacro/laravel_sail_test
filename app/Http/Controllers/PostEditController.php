<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Post;
use App\Models\Tag;
use App\Models\postTag;

class PostEditController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user(),
            'posts' => Post::with(['user', 'tags'])
                        ->where('user_id', Auth::user()->id)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10),
        ];

        return view('post.edit', $data);
    }

    public function update(Request $request)
    {
        $post_id = $request->post_id;
        $post = Post::with(['user', 'tags'])
                    ->where('id', $post_id)
                    ->first();

        //dd($post);
        $tag_words = ""; 
        foreach ($post->tags as $tag) {
            $tag_words .= $tag->name . "," ;
        };

        // 末尾のカンマを消去
        $tag_words = substr($tag_words, 0, -1);
        //dd($tag_words);

        $data = [
            'user' => Auth::user(),
            'post' => $post,
            'tags' => $tag_words,
        ];

        return view('post.update', $data);
    }

    public function store(Request $request)
    {
        $post_id = $request->post_id;
        Post::where('id', $request->post_id)
                    ->update([
                        'title' => $request->title,
                        'post' => $request->message,
                    ]);
        // 紐づいているタグをいったん消去
        postTag::where('post_id', $request->post_id)->delete();

        // カテゴリーの値を全て取得
        $categories = explode(",", $request->category);

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

        return redirect()->intended(RouteServiceProvider::HOME)->with('success', '投稿の編集が完了しました');
    }
}
