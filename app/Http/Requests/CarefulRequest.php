<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarefulRequest extends FormRequest
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
			'id_careful' => 'required',
			'date_start' => 'required',
			'hours' => 'required',
			'treatment' => 'required|string',
			'amount_food' => 'required',
			'fk_food' => 'required',
			'fk_employee' => 'required',
			'fk_animal' => 'required',
        ];
    }
}
