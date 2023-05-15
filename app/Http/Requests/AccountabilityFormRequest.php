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
            'employee_id' => 'required',
            'item_id' => 'required',           
            'department_id' => 'required',           
            'status' => 'required|max:255',
                   
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'required',
            'employee_id.required' => 'required',
            'item_id.required' => 'required',
            'department_id.required' => 'required',
            'status.max' => 'required',
   
        ];
    }
}
