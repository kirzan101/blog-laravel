<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'description' => $this->description,
            'brand' => $this->brand,
            'model' => $this->model,
            'department' => new DepartmentResource($this->department),
            'supplier' => new SupplierResource($this->supplier),
        ];
    }
}
