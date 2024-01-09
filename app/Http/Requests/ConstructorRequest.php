<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ConstructorRequest extends FormRequest
{
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'idPlatforms' => ['integer', 'required'],
      'idNPV' => ['integer', 'required'],
      'idMaterial' => ['integer', 'required'],
      'idIndicator' => ['integer', 'required'],
      'idStrainGuages' => ['integer', 'required'],
      'idFastening' => ['integer', 'required'],
    ];
  }
}