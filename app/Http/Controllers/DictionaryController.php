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

        // 最初の行を飛ばしで、残りすべての行を取得する
        $count = Dictionary::where('path', $directory)->count();
        $skip = 1;
        $limit = $count - $skip; // the limit
        $collection = Dictionary::where('path', $directory)->skip($skip)->take($limit)->get();

        // 現在いる階層の深さを取得する
        $path_length = strlen($directory) - strlen(str_replace('/', '', $directory)) - 2;

        // 現在の階層より1つ下の階層のpathを取得する
        $next_directory = Dictionary::where([
            ['path', 'LIKE', $directory .'%'],
            ['path_length', $path_length + 1]
            ])->get();
       // dd($next_directory);
 
        $data = [
            'path' => $directory,
            'path_length' => $path_length,
            'post_first' => Dictionary::where('path', $directory)->first(),
            'posts' => $collection,
            'links' => $next_directory
        ];

        return view('wiki.index', $data);
    }

    public function store(Request $request)
    {      

        // 投稿文をDBに登録
        Dictionary::create([
            'user_id' => Auth::user()->id,
            'sub_title' => $request->title,
            'post' => $request->message,
            'path' => $request->path,
            'path_length' => $request->path_length,
        ]);

        return redirect('/dictionary' . $request->path);
    }
}
