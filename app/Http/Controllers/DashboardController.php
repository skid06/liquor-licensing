<?php

namespace App\Http\Controllers;

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
        return view('admin.index');
    }

    public function completed()
    {
        return view('admin.completed');
    }

    public function show($id)
    {
        $application = Application::where('id', $id)->first();
        $data['application'] = $application;
        return view('admin.show-application', $data);
    }
}
