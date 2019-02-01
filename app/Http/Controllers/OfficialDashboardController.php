<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class OfficialDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:official');
    }
    public function main()
    {
        return view('official.index');
    }

    public function completed()
    {
        return view('official.completed');
    }   

    public function show($id)
    {
        $application = Application::where('id', $id)->first();
        $data['application'] = $application;
        return view('official.show-application', $data);
    }
}
