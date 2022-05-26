<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {      
        // コメントをDBに登録
        Comment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            ]);

        return redirect('/' . $request->user_name . '/' . $request->post_id);
    }
}
