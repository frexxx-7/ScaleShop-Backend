<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\ScaleRequest;
use App\Models\Basket;
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

  public function loadLastScale()
  {
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
      if (!CategoryScale::where("id", $scale->idCategoryScale)->get()->isEmpty()) {
        $categoryName = CategoryScale::where("id", $scale->idCategoryScale)->get()[0]->name;
        return response(compact("scale", "categoryName"));
      }
      if (!$scale)
        return response("Scale not found", 404);
      return response(compact("scales"));
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
  }
  public function loadCategoryAndScale()
  {
    try {
      $categories = CategoryScale::with([
        'scales' => function ($query) {
          $query->orderBy('created_at', 'desc')->take(5);
        }
      ])->get();
      return response(compact("categories"));
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
  }

  public function loadAllScaleInCategory(string $id)
  {
    try {
      $scales = Scale::where('idCategoryScale', $id)->get();
      return response(compact("scales"));
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
  }
  public function searchScale(string $id)
  {
    try {
      $scale = Scale::whereRaw("concat(title, content) LIKE ?", ['%' . $id . '%'])->get();
      return response(compact("scale"));
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
  }

  public function addScaleToBasket(BasketRequest $request)
  {
    try {
      $data = $request->all();
      $basket = Basket::create([
        'idUser' => $data['idUser'],
        'idScale' => $data['idScale'],
        'count' => $data['count'],
        'purchased' => $data['purchased']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("$basket"));
  }
  public function editScaleToBasket(BasketRequest $request, string $id)
  {
    try {
      $data = $request->all();
      $basket = Basket::where('id', $id)->update([
        'idUser' => $data['idUser'],
        'idScale' => $data['idScale'],
        'count' => $data['count'],
        'purchased' => $data['purchased']
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("$basket"));
  }
}