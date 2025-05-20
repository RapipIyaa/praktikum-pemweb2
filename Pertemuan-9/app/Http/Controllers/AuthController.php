<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
    {
        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password,
        ])) {
            $user = User::where("email",
            $request->email)->first();
            Auth::login($user);
            return redirect('/');

        }
    }
}
