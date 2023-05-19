<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountabilityFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'employee_id' => 'required|exists:employees,id',
            'item_id' => 'required|exists:item,id',           
            'department_id' => 'required|exists:department,id',           
            'status' => 'required|max:255',

        ];
    }
}
