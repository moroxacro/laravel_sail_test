<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\DictionaryRecursive;
use App\Models\User;

class DictionaryRecursiveController extends Controller
{
    public function index($id1= 0, $id2=1)
    {

        // 再帰クエリを使って最下層までの全データベース情報を取得
        $rawSql = <<<SQL
        WITH recursive cte AS ( SELECT n.* FROM dictionary_recursive n WHERE id = 1 UNION ALL SELECT child_dictionary_recursive.* FROM dictionary_recursive AS child_dictionary_recursive, cte WHERE cte.id = child_dictionary_recursive.parent_id) SELECT * FROM cte;
        SQL;

        $results = DB::select($rawSql);

        // 現在の階層にあるデータを取得する
        $parent = array_column($results, 'parent_id');
        $parent_id = array_keys($parent, $id1);

        $directory = array();
        foreach ($parent_id as $id) {
            array_push($directory, $results[$id]);
        }

        // さらに同じ階層内の個別ページを取得する
        $page = array_column($directory, 'id');
        $page_id = array_search($id2, $page);
        $this_page = $directory[$page_id];

        // 現在の階層より1つ下の階層のデータを取得する
        $parent = array_column($results, 'parent_id');
        $next_directory_id = array_keys($parent, $id1 + 1);

        $next_directory = array();
        foreach ($next_directory_id as $id) {
            array_push($next_directory, $results[$id]);
        }

        $data = [
            'parent_id' => $id1,
            'child_id' => $id2,
            'post' => $this_page,
            'links' => $next_directory
        ];

 
        return view('wiki.dictionary', $data);
    }

    public function store(Request $request)
    {      
        // 記事の編集を行なう場合
        if ($request->post_type == "re_write") {
            
            // 指定のDBを編集する
            DictionaryRecursive::where([
                'id' => $request->child_id,
                'parent_id' => $request->parent_id,
            ])->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'post' => $request->message,
                //'parent_id' => $request->parent_id,
            ]);
        }

        // 新規のテーマを追加する場合
        if ($request->post_type == "re_write") {
        
            // 投稿文をDBに登録
            DictionaryRecursive::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'post' => $request->message,
                'parent_id' => $request->parent_id
            ]);
            
        }


        return redirect('dictionary2');
    }

}
