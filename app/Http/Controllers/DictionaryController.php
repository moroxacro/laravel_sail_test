<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dictionary;
use App\Models\User;


class DictionaryController extends Controller
{

    public function index($id1='zero', $id2='zero', $id3='zero')
    {
        $directory = "/" . $id1 . "/";

        if ($id2 != 'zero') {
            $directory .= $id2 . "/";
        }

        if ($id3 != 'zero') {
            $directory .= $id3 . "/";
        }

        //dd($directory);
        $data = [
            'id' => $directory,
            'posts' => Dictionary::where('path', $directory)->get()
        ];
        //dd($data);
        return view('wiki.index', $data);
    }

    public function store(Request $request)
    {      

        // 投稿文をDBに登録
        Dictionary::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'post' => $request->message,
            'path' => $request->id,
        ]);

        return redirect('/dictionary/1');
    }
}
