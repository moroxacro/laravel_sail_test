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

        return view('index', [
            'posts' => Post::with('postImage')->orderBy('created_at', 'desc')->get()
        ]);
    }
}
