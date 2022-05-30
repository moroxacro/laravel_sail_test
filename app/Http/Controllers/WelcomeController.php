<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;


class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with(['postImage', 'user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(5)
            ];

        } else {
            $data = [
                'posts' => Post::with(['postImage', 'user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(5)
            ];
        }

        //dd($data);
        return view('index', $data);
    }

    public function getCategory($id='zero')
    {
        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with('postImage')
                            ->where('category', 'LIKE', '%'.$id.'%')
                            ->orderBy('created_at', 'desc')
                            ->paginate(5)
            ];

        } else {
            $data = [
                'posts' => Post::where('category', 'LIKE', '%'.$id.'%')
                            ->orderBy('created_at', 'desc')
                            ->paginate(5)
            ];
        }

        //dd($data);
        return view('index', $data);
    }
}
