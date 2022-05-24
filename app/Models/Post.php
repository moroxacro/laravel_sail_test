<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostImage;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $table ='posts';

    // 指定可能なカラム
    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'title',
        'post',
        'category',
    ];

    protected $touches = ['user'];

    /**
     * リレーション
     */
    public function postImage()
    {
        return $this->hasMany(PostImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
