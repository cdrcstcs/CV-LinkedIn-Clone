<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'admin_user_id' => $this->admin_user_id,
            'members' => $this->members,
            'admin' => new UserResource($this->whenLoaded('admin')), // Assuming you have UserResource
            'members_details' => UserResource::collection($this->whenLoaded('members')), // Assuming you have UserResource
        ];
    }
}
