<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
