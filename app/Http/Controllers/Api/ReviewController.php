<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Request;

class ReviewController extends Controller
{
  public function addReview(ReviewRequest $request)
  {
    try {
      $data = $request->all();
      $review = Review::create([
        'name' => $data['name'],
        'number' => $data['number'],
        'email' => $data['email'],
        'comment' => $data['comment'],
        'idUser' => $data['idUser'],
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("review"));
  }
  public function loadLastReview()
  {
    try {
      $reviews = Review::join('users', 'users.id', '=', 'reviews.idUser')
        ->select('reviews.*', 'users.name as userName')
        ->latest('created_at')->limit(3)->get();
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("reviews"));
  }
}