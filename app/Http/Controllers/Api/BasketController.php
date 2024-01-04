<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\ScaleRequest;
use App\Models\Basket;
use App\Models\CategoryScale;
use App\Models\Scale;
use Request;

class BasketController extends Controller
{

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
    return response(compact("basket"));
  }
  public function editScaleToBasket(BasketRequest $request, string $id)
  {
    try {
      $data = $request->all();
      Basket::where('id', $id)->update([
        'idUser' => $data['idUser'],
        'idScale' => $data['idScale'],
        'count' => $data['count'],
        'purchased' => $data['purchased']
      ]);
      $basket = Basket::where('id', $id)->get();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("basket"));
  }
  public function infoScaleScaleInBasket(BasketRequest $request)
  {
    try {
      $data = $request->all();

      $basket = Basket::where('idUser', $data['idUser'])->where('idScale', $data['idScale'])->get();

    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("basket"));
  }
}