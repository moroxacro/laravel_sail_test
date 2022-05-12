<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('index', [
            'posts' => Post::all()
        ]);
    }
}
