<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'industry' => $this->industry,
            'location' => $this->location,
            'description' => $this->description,
            'logo' => $this->logo,
            'website' => $this->website,
        ];
    }
}
