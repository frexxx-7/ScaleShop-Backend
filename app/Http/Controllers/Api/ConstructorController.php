<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConstructorRequest;
use App\Http\Requests\ContructorComponentRequest;
use App\Models\ConstrucorScale;
use App\Models\Scale;
use App\Models\ScaleFastening;
use App\Models\ScaleIndicator;
use App\Models\ScaleMaterial;
use App\Models\ScaleNPV;
use App\Models\ScalePlatform;
use App\Models\ScaleStrainGauge;
use Illuminate\Support\Facades\DB;

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
  public function addConstructorScale(ConstructorRequest $request)
  {
    try {
      $data = $request->all();
      $constructorScale = ConstrucorScale::create([
        "idPlatforms" => $data["idPlatforms"],
        "idNPV" => $data["idNPV"],
        "idMaterial" => $data["idMaterial"],
        "idIndicator" => $data["idIndicator"],
        "idStrainGuages" => $data["idStrainGuages"],
        "idFastening" => $data["idFastening"],
        "idUser" => $data["idUser"]
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("constructorScale"));
  }
  public function loadInfoConstructor(string $id)
  {
    try {
      $constructors =  DB::table('construcor_scales')
      ->select('*', DB::raw('(scale_platforms.price + scale_fastenings.price + scale_indicators.price + scale_materials.price + scale_n_p_v_s.price + scale_strain_gauges.price) as sumPrice'))
      ->join('scale_platforms', 'scale_platforms.id', '=', 'construcor_scales.idPlatforms')
      ->join('scale_fastenings', 'scale_fastenings.id', '=', 'construcor_scales.idFastening')
      ->join('scale_indicators', 'scale_indicators.id', '=', 'construcor_scales.idIndicator')
      ->join('scale_materials', 'scale_materials.id', '=', 'construcor_scales.idMaterial')
      ->join('scale_n_p_v_s', 'scale_n_p_v_s.id', '=', 'construcor_scales.idNPV')
      ->join('scale_strain_gauges', 'scale_strain_gauges.id', '=', 'construcor_scales.idStrainGuages')
      ->where('idUser', $id)
      ->get();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("constructors"));
  }
}