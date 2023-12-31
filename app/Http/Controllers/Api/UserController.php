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
      $user = $request->user();

      if ($user) {
        if (Hash::check($request->old_password, $user->password)) {
          if ($request->new_password == $request->new_password_confirmation) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['message' => 'Password changed successfully'], 200);
          } else {
            return response()->json(['error' => 'New password and confirmation do not match'], 400);
          }
        } else {
          return response()->json(['error' => 'Invalid old password'], 400);
        }
      } else {
        return response()->json(['error' => 'Unauthorized'], 401);
      }
    } catch (\Throwable $th) {
      return response($th->getMessage());
    }

  }
}