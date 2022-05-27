<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;

class CheckLikesDeplicate extends Model
{
    use HasFactory;

        //ユーザーIDと投稿IDを元にいいね値の重複チェックを行っています
        function check_likes_duplicate($user_id, $post_id) {
            $like = Like::where([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ])->first();

            return $like;
        }
}
