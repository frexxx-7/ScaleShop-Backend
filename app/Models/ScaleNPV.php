<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScaleNPV extends Model
{
    use HasFactory;
    protected $fillable = [
      'magnitude',
      'price'
   ];
}
