<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class DashboardController extends Controller
{
    public function main()
    {
        return view('admin.index');
    }

    public function completed()
    {
        return view('admin.completed');
    }

    public function show()
    {
        return view('admin.show-application');
    }
}
