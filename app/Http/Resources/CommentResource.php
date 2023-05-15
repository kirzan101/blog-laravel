<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'UserGroup' => new UserGroupResource($this->post),
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_at
        ];
    }
}
