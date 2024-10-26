<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'job_id' => $this->job_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'job' => new JobResource($this->whenLoaded('job')), // if you have a JobResource
            'user' => new UserResource($this->whenLoaded('user')), // if you have a UserResource
        ];
    }
}
