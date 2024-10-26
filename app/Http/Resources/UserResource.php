<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'profile_picture' => $this->profile_picture,
            'headline' => $this->headline,
            'summary' => $this->summary,
            'location' => $this->location,
            'industry' => $this->industry,
            'skills' => $this->skills,
            'education_history' => $this->education_history,
            'work_experience' => $this->work_experience,
            'connections' => UserResource::collection($this->whenLoaded('connections')),
            'notifications' => $this->notifications,
        ];
    }
}
