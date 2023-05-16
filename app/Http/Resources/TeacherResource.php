<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getKey(),
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'complete_name' => $this->getCompleteName(),
            'posts' => PostResource::collection($this->posts)
        ];
    }
}
