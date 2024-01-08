<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContructorComponentRequest;
use App\Models\Scale;
use App\Models\ScalePlatform;

class ConstructorController extends Controller
{
  public function addPlatform(ContructorComponentRequest $request)
  {
    try {
      $data = $request->all();
      $scalePlatform = ScalePlatform::create([
        'size'=>$data['size'],
        'price'=>$data['price']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scalePlatform"));
  }

}