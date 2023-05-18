<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherFormRequest extends FormRequest
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
            'first_name' => 'required|min:2|alpha_dash:ascii',
            'middle_name' => 'nullable|min:2|alpha_dash:ascii',
            'last_name' => 'required|min:2|alpha_dash:ascii',
            'email' => 'required|email|unique:teachers,email,'.$this->id,
            'contact_no' => 'required',
        ];
    }
}
