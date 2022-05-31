<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class WordSearchController extends Controller
{
    public function search(Request $request)
    {
        $word_searched = $request->search;
        $data = [
            'word' => $word_searched,
            'posts' => Post::with(['user', 'tags'])
                        ->whereHas('tags', function ($query) use($word_searched) {
                            return $query->where('name', 'LIKE', '%'.$word_searched.'%');
                        })
                        ->orWhere('title', 'LIKE', '%'.$word_searched.'%')
                        ->orWhere('post', 'LIKE', '%'.$word_searched.'%')
                        ->orderBy('created_at', 'desc')
                        ->paginate(10),
                        
            'tags' => Tag::orderBy('count', 'desc')->take(10)->get(),
        ];

        return view('search.index', $data);
    }
}
