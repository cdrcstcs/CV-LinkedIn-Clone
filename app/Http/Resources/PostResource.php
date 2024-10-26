<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'content' => $this->content,
            'likes' => $this->likes,
            'comments' => $this->comments,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have UserResource
        ];
    }
}
