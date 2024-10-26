<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
            'content' => $this->content,
            'post' => new PostResource($this->whenLoaded('post')), // if you have a PostResource
            'user' => new UserResource($this->whenLoaded('user')), // if you have a UserResource
        ];
    }
}
