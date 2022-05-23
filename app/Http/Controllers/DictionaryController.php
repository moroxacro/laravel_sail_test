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
        // $count = Dictionary::where('path', $directory)->count();
        // $skip = 1;
        // $limit = $count - $skip; // the limit
        // $collection = Dictionary::where('path', $directory)->skip($skip)->take($limit)->get();

        // 現在いる階層の深さを取得する
        $path_length = strlen($directory) - strlen(str_replace('/', '', $directory)) - 2;

        // 現在の階層より1つ下の階層のpathを取得する
        $next_directory = Dictionary::where([
            ['path', 'LIKE', $directory .'%'],
            ['path_length', $path_length + 1]
            ])->get();
 
        $data = [
            'path' => $directory,
            'path_length' => $path_length,
            'posts' => Dictionary::where('path', $directory)->get(),
            //'posts' => $collection,
            'links' => $next_directory
        ];

        return view('wiki.index', $data);
    }

    public function store(Request $request)
    {      
        // 新規テーマを追加する場合
        $path = null;
        $date_time = date("Ymd:His");
        if ($request->title) {
            $path = $request->path . $date_time . "/";
            // 階層の深さは１つ下の階層に合わせる
            $path_length = $request->path_length + 1;
        } else {
            $path = $request->path;
            $path_length = $request->path_length;
        }

        // 投稿文をDBに登録
        Dictionary::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'post' => $request->message,
            'path' => $path,
            'path_length' => $path_length,
        ]);

        // 新規テーマを追加する場合は、上記で作成したデータのidでpathの末尾を更新
        if ($request->title) {
            $new_id = Dictionary::where('path', $path)->first()->id;
            Dictionary::where('path', $path)
            ->update(['path' => $request->path . $new_id . "/"]);
        }

        //dd($request->path);

        return redirect('/dictionary' . $request->path);
    }

}
