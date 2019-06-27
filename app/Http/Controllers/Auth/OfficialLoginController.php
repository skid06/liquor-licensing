<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfficialLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:official');
    }

    public function showLoginForm()
    {
        return view('official.login');
        // return view('auth.official-login');
    }

    public function login(Request $request)
    {
        // validate form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];

        // attempt to log the official in
        if(\Auth::guard('official')->attempt($credentials, $request->remember)){
            // if successful, redirect to admin dashboard
            return redirect()->intended(route('official.dashboard'));
        }

        // if unsucessful, redirect to admin login with form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

}
