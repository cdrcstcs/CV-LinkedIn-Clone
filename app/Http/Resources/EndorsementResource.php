<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EndorsementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'skill_id' => $this->skill_id,
            'endorser_id' => $this->endorser_id,
            'user' => new UserResource($this->whenLoaded('user')), // Assuming you have UserResource
            'skill' => new SkillResource($this->whenLoaded('skill')), // Assuming you have SkillResource
            'endorser' => new UserResource($this->whenLoaded('endorser')), // Assuming you have UserResource
        ];
    }
}
