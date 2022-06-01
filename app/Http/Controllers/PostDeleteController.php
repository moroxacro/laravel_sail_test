<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Post;

class PostDeleteController extends Controller
{
    public function delete(Request $request) 
    {
        $post_id = $request->post_id;
        //dd($post_id);
        Post::where('id', $post_id)->delete();

        return redirect(RouteServiceProvider::HOME);
    }
}
