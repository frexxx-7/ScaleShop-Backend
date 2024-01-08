<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContructorComponentRequest;
use App\Models\Scale;
use App\Models\ScaleFastening;
use App\Models\ScaleIndicator;
use App\Models\ScaleMaterial;
use App\Models\ScaleNPV;
use App\Models\ScalePlatform;
use App\Models\ScaleStrainGauge;

class ConstructorController extends Controller
{
  public function addPlatform(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scalePlatform = ScalePlatform::create([
        'size' => $data['size'],
        'price' => $data['price']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scalePlatform"));
  }
  public function addFastening(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scaleFastening = ScaleFastening::create([
        'name' => $data['name'],
        'price' => $data['price'],
        'idIndicator' => $data['idIndicator']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scaleFastening"));
  }
  public function addIndicator(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scaleIndicator = ScaleIndicator::create([
        'name' => $data['name'],
        'price' => $data['price']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scaleIndicator"));
  }
  public function addMaterial(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scaleMaterial = ScaleMaterial::create([
        'name' => $data['name'],
        'price' => $data['price']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scaleMaterial"));
  }
  public function addNPV(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scaleNPV = ScaleNPV::create([
        'magnitude' => $data['magnitude'],
        'price' => $data['price']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scaleNPV"));
  }
  public function addStrainGauge(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scaleStrainGauge = ScaleStrainGauge::create([
        'name' => $data['name'],
        'price' => $data['price'],
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scaleStrainGauge"));
  }
  public function loadPlatformInfo()
  {
    try {
      $platforms = ScalePlatform::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("platforms"));
  }
  public function loadFasteningInfo()
  {
    try {
      $fastening = ScaleFastening::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("fastening"));
  }
  public function loadIndicatorInfo()
  {
    try {
      $indicators = ScaleIndicator::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("indicators"));
  }


  public function loadMaterialInfo()
  {
    try {
      $materials = ScaleMaterial::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("materials"));
  }
  public function loadNPVInfo()
  {
    try {
      $npv = ScaleNPV::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("npv"));
  }
  public function loadStrainGauge()
  {
    try {
      $strainGauge = ScaleStrainGauge::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("strainGauge"));
  }
}