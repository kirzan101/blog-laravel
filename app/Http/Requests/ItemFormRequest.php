<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemFormRequest extends FormRequest
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
     *@return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|min:2',
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'department_id' => 'required|min:2',
            'supplier_id' => 'required|min:2',
        ];
    }
}
