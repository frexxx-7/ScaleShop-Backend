<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstrucorScale extends Model
{
  use HasFactory;
  protected $fillable = [
    "idPlatforms",
    "idNPV",
    "idMaterial",
    "idIndicator",
    "idStrainGuages",
    "idFastening",
    "idUser"
  ];

}
