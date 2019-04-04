<?php
namespace App\Http\Repositories\Interfaces;

interface ApplicationInterface
{
   public function store($attributes);

   public function show($id);

   public function getApplications($status, $search);

   public function authUserApplications(string $status, string $get);

   public function filterApplicationByDate($by, $count, $status);

}