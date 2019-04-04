<?php
namespace App\Http\Repositories\Interfaces;

interface BusinessClassificationInterface
{
   public function store(array $attributes);

   public function show($id);

}