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
            'employee_id' => $this->employee_id,
            'item_id' => $this->item_id,
            'department_id' => $this->department_id,
            'status' => $this->status,
            //'comments' => $this->comments//CommentResource::collection($this->comments),
        ];
    }
}
