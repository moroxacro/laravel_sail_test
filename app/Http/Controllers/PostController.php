<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Post;
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
            'post' => Post::find($id)
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
        Post::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'title' => $request->title,
            'post' => $request->message,
            'category' => $request->category,
        ]);
        return redirect()->intended(RouteServiceProvider::HOME)->with('success', '投稿が完了しました');
    }
}
