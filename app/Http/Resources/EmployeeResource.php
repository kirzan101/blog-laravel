<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
        'first_name' => $this->first_name,
        'middle_name' => $this->middle_name,
        'last_name' =>  $this->last_name,
        'contact_number' => $this->contact_number,
        'position' => $this->position,
        'department' => new DepartmentResource ($this->department),
        'user_id' => $this->user_id,
        //'comments' => $this->comments//CommentResource::collection)$this->comments),
        ];
    }
}
