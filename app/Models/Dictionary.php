<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;
    protected $table ='dictionary';

    // 指定可能なカラム
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'sub_title',
        'post',
        'path',
        'path_length',
    ];
}
