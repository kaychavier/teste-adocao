<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('animals')->whereNull('deleted_at')->where('specie_id', $this->specie_id)->where('age', $this->age)->ignore($this->route('animal'))],
            'breed_id' => ['required', 'exists:breeds,id'],
            'specie_id' => ['required', 'exists:species,id'],
            'genre' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric'],
            'size' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'gallery' => ['required', 'array', 'min:1', 'max:5'],
            'gallery.*.image' => ['nullable', 'image'],
            'gallery.*.id' => ['nullable']
        ];
    }

    public function attributes()
    {
        return [
            'gallery' => 'fotos',
        ];
    }
}
