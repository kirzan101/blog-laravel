<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
        // dd($employee);
        return [
            'first_name' => 'required|min:2|alpha_dash:ascii',
            'middle_name' => 'nullable|min:2|alpha_dash:ascii',
            'last_name' => 'required|min:2|alpha_dash:ascii',
            'contact_number' => 'required|min:2',
            'position' => 'required|min:2',
            'department_id' => 'required|exists:departments,id',
            'email' => 'required|email|unique:users,email,'.$this->employee->user_id,
            'password' => 'required|min:8',
            'user_group_id' => 'required|exists:user_groups,id'
        ];
    }
}