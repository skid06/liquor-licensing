<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin');
        //$this->middleware('auth:admin', ['only' => ['login']]);
    }

    public function showLoginForm()
    {
        // return view('auth.admin-login');
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];

        // attempt to log the admin in
        if(\Auth::guard('admin')->attempt($credentials)){
            // if successful, redirect to admin dashboard
            // return redirect()->intended(route('admin.dashboard'));
            return response()->json(['message' => true]);
        }
        return response()->json(['message' => 'Incorrect combination of email and password.'], 401);

        // if unsucessful, redirect to admin login with form data
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
