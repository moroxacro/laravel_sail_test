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
                'posts' => Post::with('postImage')->orderBy('created_at', 'desc')->get()
            ];

        } else {
            $data = [
                'posts' => Post::with('postImage')->orderBy('created_at', 'desc')->get()
            ];
        }

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
