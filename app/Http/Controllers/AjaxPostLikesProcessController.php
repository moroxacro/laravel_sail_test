<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Like;
use App\Models\CheckLikesDeplicate;

class AjaxPostLikesProcessController extends Controller
{

    public function store(Request $request) {
        
        if (isset($request)) {

            $user_name = $request->user_name;
            $post_id = $request->post_id;
                    
            //既に登録されているか確認
            $CheckLikesDeplicate = new CheckLikesDeplicate;
            if ($CheckLikesDeplicate->check_likes_duplicate(Auth::user()->id ,$post_id))
            {
                $action = '解除';
                Like::where([
                    'user_id' => Auth::user()->id,
                    'post_id' => $post_id
                    ])->delete();
                return response()->json($action);

            } else {

                $action = '登録';
                Like::create([
                    'user_id' => Auth::user()->id,
                    'post_id' => $post_id
                ]);   
                return response()->json($action);

            }
        }
        
    }

}
