<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postTag extends Model
{
    use HasFactory;
    protected $table ='post_tag';

    protected $fillable = [
        'id',
        'post_id',
        'tag_id',
    ];



}
