<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Animal;

class UpdateAnimalRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'species' => ['required','string', Rule::in(Animal::SPECIES)],
            'breed' => ['nullable','string','max:255'],
            'age' => ['nullable','integer','min:0','max:100'],
            'weight' => ['nullable','numeric','min:0','max:9999.99'],
            'color' => ['nullable','string','max:255'],
            'is_vaccinated' => ['nullable','boolean'],
            'notes' => ['nullable','string','max:2000'],

            // imagen opcional
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:2048'],
        ];
    }
}
