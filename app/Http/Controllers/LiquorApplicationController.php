<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\Interfaces\ApplicationInterface;

class LiquorApplicationController extends Controller
{
    public $repo;
    /**
     * Constructor
     * @param ApplicationInterface $application
     */
    public function __construct(ApplicationInterface $application)
    {
        $this->repo = $application;
    }

    public function store(Request $request)
    {
        $this->repo->store($request);
    }

    public function getApplications($status, $search = null)
    {
        return $this->repo->getApplications($status, $search);
    }

    public function authUserApplications($status = null, $get = null)
    {
        return $this->repo->authUserApplications($status, $get);
    }

    public function filterApplicationByDate($by, $count, $status)
    {
        $this->repo->filterApplicationByDate($by, $count, $status);
    }
}
