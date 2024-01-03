<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryScale extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'image'
  ];

  public function scales()
  {
    return $this ->hasMany(Scale::class, "idCategoryScale");
  }
}
