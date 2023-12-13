<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Storage;
use Request;

class UserController extends Controller
{
  public function loadInfoUser(Request $request, string $id)
  {
    $user = User::where("id", $id)->first();
    return response(compact('user'));
  }

  public function editUser(EditUserRequest $request, string $id)
  {
    $data = $request->all();

    try {
      $user = User::where('id', $id)->update([
        'name' => $data['name'],
        'email' => $data['email'],
      ]);
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }
    return response(compact("user"));
  }
  public function updatePassword(ChangePasswordRequest $request)
  {
    try {
      $user = User::where('reset_token', $request->token)->first();

      if (!$user) {
          return response()->json(['error' => 'Invalid token'], 404);
      }
  
      if (Hash::check($request->old_password, $user->password)) {
          $user->password = Hash::make($request->new_password);
          $user->save();
  
          return response()->json(['message' => 'Password updated successfully'], 200);
      } else {
          return response()->json(['error' => 'Invalid old password'], 422);
      }
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }

  }
}