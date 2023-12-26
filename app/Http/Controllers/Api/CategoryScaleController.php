<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryScaleRequest;
use App\Models\CategoryScale;

class CategoryScaleController extends Controller
{
  public function addCategoryScale(CategoryScaleRequest $request)
  {
    try {
      $data = $request->all();
      $category_scale = CategoryScale::create([
        'name'=>$data["name"]
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("category_scale"));
  }
  public function categoryScaleInfo()
  {
    try {
      $categorys_scale = CategoryScale::all();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("categorys_scale"));
  }
}