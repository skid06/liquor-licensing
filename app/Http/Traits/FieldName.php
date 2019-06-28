<?php

namespace App\Http\Traits;

trait FieldName
{

  public function setValue($attributes)
  {
    return $value = isset($attributes) ? $attributes : '';
  }
}