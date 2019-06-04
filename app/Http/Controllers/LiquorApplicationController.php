<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\Interfaces\ApplicationInterface;
use App\Http\Repositories\LiquorApplicationRepository;

class LiquorApplicationController extends Controller
{
    public $application;
    /**
     * Constructor
     * @param ApplicationInterface $application
     */
    public function __construct(LiquorApplicationRepository $application)
    {
        $this->application = $application;
    }

    public function index($type)
    {
        return $this->application->index($type);
    }

    public function store(Request $request)
    {
        return $this->application->store($request);
    }

    public function getApplicationById($id){
        return $this->application->getApplicationById($id);
    }

    public function getApplications($search = null)
    {
        return $this->application->getApplications($search);
    }

    public function authUserApplications($status = null, $search = null)
    {
        return $this->application->authUserApplications($status, $search);
    }

    public function filterApplicationByDate($by, $count, $status)
    {
        $this->application->filterApplicationByDate($by, $count, $status);
    }

    public function processApplication($id)
    {
        return $this->application->processApplication($id);
    }    

    public function sendEmailWithPDF(Request $request)
    {
        // return $request->all();
        return $this->application->sendEmailWithPDF($request);
    }
}
