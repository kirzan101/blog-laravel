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
            'employee_id' => (int) $this->getKey(),
            'item_id' => (int) $this->getKey(),
            'department_id' => (int) $this->getKey(),
            'status' => $this->status,
        ];
    }
}
