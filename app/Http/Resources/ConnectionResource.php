<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConnectionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id_1' => $this->user_id_1,
            'user_id_2' => $this->user_id_2,
            'status' => $this->status,
            'user1' => new UserResource($this->whenLoaded('user1')), // Assuming you have UserResource
            'user2' => new UserResource($this->whenLoaded('user2')), // Assuming you have UserResource
        ];
    }
}
