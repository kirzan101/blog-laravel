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
            'code' => 'required|min:2',
            'serial_number' => 'required|unique:stoocks,serial_number,'.$this->id,
            'manufacture_date' => 'required|date_format:Y-m-d',
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}