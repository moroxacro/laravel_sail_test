<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\NewsDirector;
use App\Models\RssNewsBuilder;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $builder = new RssNewsBuilder();
        $url = 'https://news.yahoo.co.jp/rss/topics/top-picks.xml';
        $director = new NewsDirector($builder, $url);

        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with(['user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
                'news' => $director->getNews(),
            ];


        } else {
            $data = [
                'posts' => Post::with(['user', 'tags'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
                'news' => $director->getNews(),
            ];
        }

        return view('index', $data);
    }

    public function tag($id='none')
    {
        $builder = new RssNewsBuilder();
        $url = 'https://news.yahoo.co.jp/rss/topics/top-picks.xml';
        $director = new NewsDirector($builder, $url);

        if (Auth::check()) {
            $data = [
                'user' => Auth::user(),
                'posts' => Post::with(['user', 'tags'])
                            ->whereHas('tags', function ($query) use($id) {
                                return $query->where('name', 'LIKE', '%'.$id.'%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(10),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
                'news' => $director->getNews(),
            ];

        } else {
            $data = [
                'posts' => Post::with(['user', 'tags'])
                            ->whereHas('tags', function ($query) use($id) {
                                return $query->where('name', 'LIKE', '%'.$id.'%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(10),
                'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
                'news' => $director->getNews(),
            ];
        }

        return view('index', $data);
    }

}
