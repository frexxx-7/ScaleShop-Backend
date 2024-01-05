<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class BasketRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'idUser' => ["integer", 'required'],
      'idScale' => ["integer", "nullable"],
      'count' => ["integer", "nullable"],
      'purchased' => ["boolean", "nullable"],
    ];
  }
}