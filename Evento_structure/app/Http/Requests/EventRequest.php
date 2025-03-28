<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'venue' => ['required', 'string'],
            'availablePlaces' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'date' => ['required', 'after:today'],
            'validationType' => ['required', 'string'],
            'category' => ['required', 'integer'],
            'organizerID' => ['required', 'integer'],
        ];
    }
}
