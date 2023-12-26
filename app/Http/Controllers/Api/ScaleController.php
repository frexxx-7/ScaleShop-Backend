<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScaleRequest;
use App\Models\Scale;

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
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("news"));
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
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("news"));
  }

}