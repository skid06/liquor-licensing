<?php
namespace App\Http\Repositories\Interfaces;

interface ApplicationInterface
{
   public function store($attributes);

   public function getApplicationById($id);

   public function getApplications($search);

   public function authUserApplications(string $status, string $get);

   public function processApplication(int $id);

   public function filterApplicationByDate($by, $count, $status);

}