<?php
namespace App\Http\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
   public function store(array $attributes);

   public function show($id);

   public function getApplications($status, $search);

   public function filterApplicationByDate($by, $count, $status);

}