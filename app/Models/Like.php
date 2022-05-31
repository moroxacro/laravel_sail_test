<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table ='likes';

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
    ];

    /**
     * リレーション
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // いいね値の重複チェック
    public static function check_likes_duplicate($user_id, $post_id) {
        $is_duplicated = self::where([
            'user_id' => $user_id,
            'post_id' => $post_id,
        ])->first();

        return $is_duplicated;
    }

}
