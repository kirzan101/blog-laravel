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
            'code' => 'required|min:2|unique:stocks,code,'.$this->id,
            'serial_number' => 'required|min:2|unique:stocks,serial_number,'.$this->id,
            'manufacture_date' => 'required|date_format:Y-m-d',
            'item_id' => 'required',
            'supplier_id' => 'required',
        ];
    }
}