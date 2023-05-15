<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockFormRequest extends FormRequest
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
            'code' => 'required|max:10',
            'serial_number' => 'required|max:10',
            'manufacture_date' => 'required|max:10',
            'item_id' => 'required|max:10',
            'supplier_id' => 'required|max:10',
        ];
    }
}
