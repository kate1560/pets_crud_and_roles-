<?php

namespace App\Http\Requests;

use App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAnimalRequest extends FormRequest
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
            'age.integer' => 'La edad debe ser un número entero.',
            'age.min' => 'La edad no puede ser menor que 0.',
            'age.max' => 'La edad no puede ser mayor que 100.',
            'weight.numeric' => 'El peso debe ser un número.',
            'weight.min' => 'El peso no puede ser negativo.',
            'notes.max' => 'Las notas no deben superar 2000 caracteres.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_vaccinated' => $this->boolean('is_vaccinated'),
        ]);
    }
}
