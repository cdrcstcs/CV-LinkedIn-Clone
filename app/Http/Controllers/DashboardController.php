<?php
// DashboardController.php
namespace App\Http\Controllers;

use App\Http\Requests\DashboardRequest; // Import the request
use App\Http\Resources\DashboardResource; // Import the resourceuse App\Models\Post;
use App\Models\User;
use App\Models\Connection;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Event;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index(DashboardRequest $request) // Use the request
    {
        $user = $request->user();

        // Fetch user connections
        $connections = Connection::with('user')
            ->where(function ($query) use ($user) {
                $query->where('user_id_1', $user->id)
                      ->orWhere('user_id_2', $user->id);
            })
            ->where('status', 'accepted')
            ->get();

        // Fetch recent posts with filtering options
        $posts = Post::with('user', 'likes', 'comments.user')
            ->when($request->input('filter'), function ($query) use ($request) {
                return $query->where('content', 'like', '%' . $request->input('filter') . '%');
            })
            ->latest()
            ->paginate(10);

        // Fetch job recommendations
        $recommendedJobs = $this->getJobRecommendations($user);

        // Fetch user notifications
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Fetch upcoming events
        $events = Event::where('date_time', '>=', now())
            ->orderBy('date_time')
            ->take(5)
            ->get();

        // Fetch user engagement metrics
        $engagementMetrics = $this->getUserEngagementMetrics($user);

        // Fetch top skills from user's profile
        $topSkills = Skill::with('users')
            ->whereIn('id', $user->skills)
            ->orderBy('endorsement_count', 'desc')
            ->take(5)
            ->get();

        // Pass data to the resource
        return new DashboardResource([
            'user' => $user,
            'connections' => $connections,
            'posts' => $posts,
            'recommendedJobs' => $recommendedJobs,
            'notifications' => $notifications,
            'events' => $events,
            'engagementMetrics' => $engagementMetrics,
            'topSkills' => $topSkills,
        ]);
    }

    private function getJobRecommendations(User $user)
    {
        // Advanced job recommendations considering previous applications and searches
        return Job::with('company')
            ->where('location', $user->location)
            ->orWhere(function ($query) use ($user) {
                $query->where('skills_required', 'like', '%' . implode('%', $user->skills) . '%')
                      ->orWhere('description', 'like', '%' . implode('%', $user->skills) . '%');
            })
            ->latest()
            ->paginate(5);
    }

    private function getUserEngagementMetrics(User $user)
    {
        // Calculate engagement metrics like total posts, likes received, comments made, etc.
        return [
            'totalPosts' => Post::where('user_id', $user->id)->count(),
            'totalLikes' => $user->likes()->count(),
            'totalComments' => $user->comments()->count(),
            'totalConnections' => Connection::where('user_id_1', $user->id)
                                             ->orWhere('user_id_2', $user->id)
                                             ->where('status', 'accepted')
                                             ->count(),
        ];
    }
}
