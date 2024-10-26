<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date_time' => $this->date_time,
            'location' => $this->location,
            'host_user_id' => $this->host_user_id,
            'attendees' => $this->attendees,
            'host' => new UserResource($this->whenLoaded('host')), // Assuming you have UserResource
            'attendees_details' => UserResource::collection($this->whenLoaded('attendees')), // Assuming you have UserResource
        ];
    }
}
