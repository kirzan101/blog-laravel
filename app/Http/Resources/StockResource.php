<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (int) $this->getKey(),
            'code' => $this->code,
            'serial_number' => $this->serial_number,
            'manufacture_date' => $this->manufacture_date,
            'item' => new ItemResource($this->item),
            'supplier' => new SupplierResource($this->supplier),
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_at,
        ];
    }
}