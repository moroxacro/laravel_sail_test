<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // $posts = Post::with('postImage')->get();
        // dd($posts);
        $data = [
            'posts' => Post::with('postImage')->orderBy('created_at', 'desc')->get()
        ];
        //dd($data);
        return view('index', $data);
    }

    public function getCategory($id='zero')
    {
        $data = [
            'posts' => Post::where('category', 'LIKE', '%'.$id.'%')->get(),
        ];
        //dd($data);
        return view('index', $data);
    }
}
