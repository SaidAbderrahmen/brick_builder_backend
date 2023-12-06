<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecepieUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'picture' => ['image', 'max:1024', 'required'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'type' => ['required', 'in:breakfast,lunch,dinner,desert'],
            'time' => ['required', 'numeric'],
            'serves' => ['required', 'numeric'],
            'instructions' => ['required', 'max:255', 'string'],
            'energie' => ['required', 'numeric'],
            'sugar' => ['required', 'numeric'],
            'calories' => ['required', 'numeric'],
            'fat' => ['required', 'numeric'],
        ];
    }
}
