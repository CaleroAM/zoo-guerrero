<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
			'id_animal' => 'required',
			'name' => 'required|string',
			'age' => 'required',
			'height' => 'required',
			'weigh' => 'required',
			'sex' => 'required',
			'fecha_nac' => 'required',
			'descripcion' => 'required|string',
			'fk_specie' => 'required',
			'fk_zone' => 'required',
        ];
    }
}
