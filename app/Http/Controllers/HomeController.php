<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function my_applications()
    {
        return view('my-applications');
    }

    public function processed()
    {
        return view('processed-applications');
    }

    public function incomplete()
    {
        return view('incomplete-applications');
    }
    
    public function showIncompleteApplication($id)
    {
        $application = Application::where('id', $id)->first();
        $data['application'] = $application;        
        return view('incomplete-form-application', $data);
    }    

    public function completed()
    {
        return view('completed-applications');
    } 
    
    public function paid()
    {
        return view('paid-applications');
    }     
}
