<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Dictionary;
use App\Models\User;

class DictionaryRecursiveController extends Controller
{
    public function index($id1= 0, $id2=0)
    {

        // 最初の行を飛ばしで、残りすべての行を取得する
        // $count = Dictionary::where('path', $directory)->count();
        // $skip = 1;
        // $limit = $count - $skip; // the limit
        // $collection = Dictionary::where('path', $directory)->skip($skip)->take($limit)->get();

        // 再帰クエリを使って最下層までの全データベース情報を取得
        $rawSql = <<<SQL
        WITH recursive cte AS ( SELECT n.* FROM dictionary_recursive n WHERE id = 1 UNION ALL SELECT child_dictionary_recursive.* FROM dictionary_recursive AS child_dictionary_recursive, cte WHERE cte.id = child_dictionary_recursive.parent_id) SELECT * FROM cte;
        SQL;

        $results = DB::select($rawSql);

        // 現在の階層にあるデータを取得する
        $parent_id = array_column($results, 'parent_id');
        $keys = array_keys($parent_id, $id1);

        $directory = array();
        foreach ($keys as $key) {
            array_push($directory, $results[$key]);
        }

        // 同じ階層に複数のページがある場合は、特定のページ情報のみ取得
        if (isset($id2)) {

        }

        //dd($directory);

        // 現在の階層より1つ下の階層のデータを取得する
        $parent_id = array_column($results, 'parent_id');
        $keys = array_keys($parent_id, $id1 + 1);

        $next_directory = array();
        foreach ($keys as $key) {
            array_push($next_directory, $results[$key]);
        }
        
        //dd($next_directory);
 
        $data = [
            // 'path_length' => $path_length,
            'path_id' => $id1,
            'posts' => $directory,
            //'posts' => $collection,
            'links' => $next_directory
        ];

        return view('wiki.dictionary', $data);
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


        return redirect('/dictionary' . $request->path);
    }

}
