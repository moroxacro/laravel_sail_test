<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegistPost;
use App\Models\User;

class UserEditController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        //dd($data);
        return view('edit', $data);
    }

    public function edit(UserRegistPost $request)
    {
        $user = User::where('id', Auth::user()->id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //dd($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
