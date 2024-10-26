<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'content' => $this->content,
            'read_status' => $this->read_status,
            'sender' => new UserResource($this->whenLoaded('sender')), // Assuming you have UserResource
            'receiver' => new UserResource($this->whenLoaded('receiver')), // Assuming you have UserResource
        ];
    }
}
