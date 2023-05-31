<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
            'required',
            'string',
            Rule::unique('games')->ignore($this->game),
            'max:150'],
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric|lt:1000',
            'discount' => 'nullable|numeric|min:0|max:1',
            'developer' => 'required|string|max:70',
            'platforms' => 'required|exists:platforms,id',
            'release_date' => 'required|date',
            'score' => 'nullable|numeric|max:10',
            'original_language' => 'required|string|max:20',
            'available_language' => 'required|string',
            'released' => 'boolean',
            'publisher_id' => 'nullable|exists:publishers,id',
            'genres' => 'nullable|exists:genres,id',
        ];
    }
}
