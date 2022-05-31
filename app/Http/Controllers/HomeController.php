<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with(['user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(5),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
            ];


        } else {
            $data = [
                'posts' => Post::with(['user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(5),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
            ];
        }

        return view('index', $data);
    }

    public function tag($id='none')
    {
        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with(['user', 'tags'])
                            ->whereHas('tags', function ($query) use($id) {
                                return $query->where('name', 'LIKE', '%'.$id.'%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(5),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
            ];

        } else {
            $data = [
                'posts' => Post::with(['user', 'tags'])
                            ->whereHas('tags', function ($query) use($id) {
                                return $query->where('name', 'LIKE', '%'.$id.'%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(5),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
            ];
        }

        //dd($data);
        return view('index', $data);
    }

}
