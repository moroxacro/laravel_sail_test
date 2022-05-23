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
        $rawSql_1 = <<<SQL
        WITH recursive cte AS ( 
            SELECT * 
            FROM dictionary_recursive
            WHERE id = 1 
        UNION ALL 
            SELECT child_dictionary_recursive.* 
            FROM dictionary_recursive AS child_dictionary_recursive, cte 
            WHERE cte.id = child_dictionary_recursive.parent_id
            ) 
            SELECT * FROM cte;
        SQL;

        $all_directories = DB::select($rawSql_1);

        // 現在の階層にある個別データを取得
        $rawSql_2 = <<<SQL
            SELECT * 
            FROM dictionary_recursive
            WHERE id = $id2 && parent_id = $id1
        SQL;

        $this_directory = DB::select($rawSql_2);

        // 現在の階層の子孫データを取得する
        $rawSql_3 = <<<SQL
            SELECT id, title, parent_id
            FROM dictionary_recursive
            WHERE parent_id = $id2
        SQL;

        $child_directory = DB::select($rawSql_3);

        // 現在の階層の親データを取得する
        $rawSql_4 = <<<SQL
            SELECT id, title, parent_id
            FROM dictionary_recursive
            WHERE id = $id1
        SQL;

        $parent_directory = DB::select($rawSql_4);

        $data = [
            'parent_id' => $id1,
            'child_id' => $id2,
            'post' => $this_directory,
            'parent_link' => $parent_directory,
            'child_links' => $child_directory,
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
            ]);
        }

        // 新規のテーマを追加する場合
        if ($request->post_type == "create") {
        
            // 投稿文をDBに登録
            DictionaryRecursive::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'post' => $request->message,
                'parent_id' => $request->child_id,
             ]);
            
        }

        return redirect('dictionary2/' . $request->parent_id . '/' . $request->child_id);
    }

}
