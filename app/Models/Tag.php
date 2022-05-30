<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Tag extends Model
{
    use HasFactory;
    protected $table ='tags';

    protected $fillable = [
        'id',
        'name',
        'count',
        'temporary_id',
    ];

    /**
     * リレーション
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // タグの重複チェック
    public static function check_tags_duplicate($tag_name) {
        $is_duplicated = self::where([
            'name' => $tag_name,
        ])->first();

        return $is_duplicated;
    }
}
