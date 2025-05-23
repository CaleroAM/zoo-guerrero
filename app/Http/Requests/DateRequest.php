<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRequest extends FormRequest
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
			
			'fk_employee' => 'required',
			'phone' => 'required|string',
			'email' => 'required|string',
			'street' => 'required|string',
			'cologne' => 'required|string',
			'cp' => 'required|string',
			'state' => 'required|string',
        ];
    }
}
