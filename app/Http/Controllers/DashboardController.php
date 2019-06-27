<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Application;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function main()
    {
        // return view('admin.index');
        return view('dashboard');
    }

    public function viewForm($id)
    {
        $data['id'] = $id;

        return view('admin.application-form', $data);
    }

    public function completed()
    {
        return view('admin.completed');
    }   

    public function processed()
    {
        return view('admin.processed');
    } 
    
    public function paid()
    {
        return view('admin.paid');
    }     

    public function show($id)
    {
        $application = Application::where('id', $id)->first();
        $data['application'] = $application;
        return view('admin.show-application', $data);
    }

    public function updateAdminInfo(Request $request)
    {
        // return $request->image;
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'phone' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password'
            // 'confirm_password' => 'required|min:6'
        ]);

        $user = Admin::where('id', Auth::guard('admin')->user()->id)->first();
 
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
   
        if(isset($request->image)){
            // $imageName = time().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('images'), $imageName);
            $path = $request->file('image')->store('avatars','public');
            $admin->image = $path;
        }        
        
        $admin->password = bcrypt($request->password);
        $admin->save();

        return response()->json(['user' => $user, 'message' => 'Successfully edited your profile.']);

    }    
}
