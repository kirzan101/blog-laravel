<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     *@return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|min:2',
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'department_id' => 'required|exists:departments,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }

    /**
     * Set custom validation message
     *
     * @return array
     */
    public function messages() : array
    {
        return [
            'department_id.required' => 'The department field is required.',
            'supplier_id.required' => 'The supplier field is required.',
        ];
    }
}
