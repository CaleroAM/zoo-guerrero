<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18|max:99',
            'Sex' => 'required|in:Masculino,Femenino',
            'type_empl' => 'required|string|max:255',
            'fk_shift' => 'required|integer|exists:shifts,id_shift',

            'id_boss' => [
                Rule::requiredIf($this->input('type_empl') !== 'Gerente General'),
                'nullable', // Esto aún lo dejamos por si no se cumple la condición
                'exists:employees,id_employee'
            ],
        ];

    }



}
