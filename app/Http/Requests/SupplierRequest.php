<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
			'rfc' => 'required|string',
			'name' => 'required|string',
			'phone' => 'required|string',
			'mail' => 'required|string',
			'addres' => 'required|string',
			'type_sup' => 'required|string',
        ];
    }
}
