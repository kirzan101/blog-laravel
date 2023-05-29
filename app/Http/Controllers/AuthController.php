<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * login page
     *
     * @return void
     */
    public function index()
    {
        return view('login');
    }

    /**
     * login user
     *
     * @return void
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|min:2',
            'password' => 'required|min:2'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->withSuccess('logged in');
        }

        return redirect('/login')->withSuccess('Login details are not valid');
    }

    /**
     * logout user
     *
     * @return void
     */
    public function logout()
    {
        // Session::flush();
        Auth::logout();

        return Redirect('/login');
    }
}
