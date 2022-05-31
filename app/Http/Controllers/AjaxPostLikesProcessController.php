<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Like;

class AjaxPostLikesProcessController extends Controller
{

    public function store(Request $request) {
        
        if (isset($request)) {

            $user_name = $request->user_name;
            $post_id = $request->post_id;
                    
            //既に登録されているか確認
            if (Like::check_likes_duplicate(Auth::user()->id ,$post_id))
            {
                $action = '解除';
                Like::where([
                    'user_id' => Auth::user()->id,
                    'post_id' => $post_id
                    ])->delete();
                //この投稿の最新の総いいね数を取得
                $likes_count = count(Like::where('post_id', $post_id)->get());

                $param = [
                    'action' => $action,
                    'likes_count' => $likes_count,
                ];
                return response()->json($param); //JSONデータをjQueryに返す

            } else {

                $action = '登録';
                Like::create([
                    'user_id' => Auth::user()->id,
                    'post_id' => $post_id
                ]);
                //この投稿の最新の総いいね数を取得
                $likes_count = count(Like::where('post_id', $post_id)->get());

                $param = [
                    'action' => $action,
                    'likes_count' => $likes_count,
                ];
                return response()->json($param);

            }
        }
        
    }

}
