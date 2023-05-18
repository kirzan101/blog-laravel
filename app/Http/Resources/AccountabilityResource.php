<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountabilityResource extends JsonResource
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
            'employee' => new EmployeeResource($this->employee),
            'item' => new ItemResource($this->item),
            'department' => new DepartmentResource($this->department),
            'status' => $this->status,
            'received_at' => $this->received_at,
            'returned_at' => $this->returned_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
