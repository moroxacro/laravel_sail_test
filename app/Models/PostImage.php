<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    use HasFactory;
    protected $table ='posts_images';

    // 指定可能なカラム
    protected $fillable = [
        'id',
        'post_id',
        'image',
    ];

     /**
     * リレーション
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
