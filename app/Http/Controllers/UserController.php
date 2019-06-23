<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    //
    public function userInfo()
    {
        return \App\User::where('id', \Auth::user()->id)->first();
    }

    public function userType()
    {
        if(\Auth::guard('web')->user())
            return response()->json(['type' => 'user']);
        elseif(\Auth::guard('admin')->user())
            return response()->json(['type' => 'admin']);        
    }

    public function getProfilePage()
    {
        return view('user.profile');
    }

    public function editUserInfo(Request $request)
    {
        // return $request->image;
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password'
            // 'confirm_password' => 'required|min:6'
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
   
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
        }        
        
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['user' => $user, 'message' => 'Successfully edited your profile.']);

    }
}
