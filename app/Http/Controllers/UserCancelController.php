<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserCancelController extends Controller
{
    public function index()
    {
        $data = [
            'user' => Auth::user()
        ];
        
        return view('account.cancel', $data);
    }

    public function cancel(LoginRequest $request)
    {
        $request->authenticate();

        $user = User::where('id' , Auth::user()->id)
        ->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
