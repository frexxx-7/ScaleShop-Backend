<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ScaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'title' => ['required', 'string', 'max:191'],
          'content' => ['required', 'string'],
          'image' => ['nullable','string'],
          'price' => ['integer'],
          'count' => ['integer'],
        ];
    }
}