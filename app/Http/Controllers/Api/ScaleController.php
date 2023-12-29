<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScaleRequest;
use App\Models\CategoryScale;
use App\Models\Scale;
use Request;

class ScaleController extends Controller
{
  public function addScale(ScaleRequest $request)
  {
    try {
      $data = $request->all();
      $scale = Scale::create([
        'title' => $data['title'],
        'content' => $data['content'],
        'image' => $data['image'],
        'price' => $data['price'],
        'count' => $data['count'],
        'idCategoryScale' => $data['idCategoryScale'],
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scale"));
  }
  public function editScale(ScaleRequest $request, string $id)
  {

    try {
      $data = $request->all();
      $scale = Scale::where('id', $id)->update([
        'title' => $data['title'],
        'content' => $data['content'],
        'image' => $data['image'],
        'price' => $data['price'],
        'count' => $data['count'],
        'idCategoryScale' => $data['idCategoryScale'],
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scale"));
  }

  public function loadLastScale(){
    try {
      $scale = Scale::latest('created_at')->limit(5)->get();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("scale"));
  }
  public function oneScale(Request $request, string $id)
    {
        try {
            $scale = Scale::all()->where("id", $id)->first();
            $categoryName = CategoryScale::where("id", $scale->idCategoryScale)->get()[0]->name;
            if (!$scale)
                return response("Scale not found", 404);
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }
        return response(compact("scale", "categoryName"));
    }
}