<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'content' => $this->content,
            'read_status' => $this->read_status,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have UserResource
        ];
    }
}
