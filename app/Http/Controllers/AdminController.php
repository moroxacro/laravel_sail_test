<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        return view('admin');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'password' => $request->password,
        ];
        DB::insert('insert into users (name, email, password) values (:name, :mail, :password)', $param);
        return redirect('complete');
    }

    public function complete(Request $request)
    {
        return view('complete');
    }
}
