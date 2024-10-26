<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'job_title' => $this->job_title,
            'description' => $this->description,
            'location' => $this->location,
            'skills_required' => $this->skills_required,
            'posted_by' => $this->posted_by,
            'company' => new CompanyResource($this->whenLoaded('company')), // Assuming you have CompanyResource
            'poster' => new UserResource($this->whenLoaded('poster')), // Assuming you have UserResource
        ];
    }
}
