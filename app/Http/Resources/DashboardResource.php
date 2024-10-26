<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user' => $this->user, // User data
            'connections' => $this->connections,
            'posts' => $this->posts,
            'recommended_jobs' => $this->recommendedJobs,
            'notifications' => $this->notifications,
            'events' => $this->events,
            'engagement_metrics' => $this->engagementMetrics,
            'top_skills' => $this->topSkills,
        ];
    }
}
