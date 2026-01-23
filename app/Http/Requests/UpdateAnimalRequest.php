<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnimalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'species.required' => 'La especie es obligatoria.',
            'species.in' => 'La especie seleccionada no es válida.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_vaccinated' => $this->boolean('is_vaccinated'),
        ]);
    }
}
