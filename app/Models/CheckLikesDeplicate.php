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

    // いいね値の重複チェック
    function check_likes_duplicate($user_id, $post_id) {
        $is_duplicated = Like::where([
            'user_id' => $user_id,
            'post_id' => $post_id,
        ])->first();

        return $is_duplicated;
    }
}
