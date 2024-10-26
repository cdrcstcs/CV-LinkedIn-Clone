<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'bio' => $this->bio,
            'visibility' => $this->visibility,
            'current_position' => $this->current_position,
            'profile_url' => $this->profile_url,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have UserResource
        ];
    }
}
