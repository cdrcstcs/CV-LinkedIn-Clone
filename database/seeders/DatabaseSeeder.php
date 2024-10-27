<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Event;
use App\Models\Group;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Application;
use App\Models\Post;
use App\Models\Message;
use App\Models\Connection;
use App\Models\Notification;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Users with Relationships
        User::factory()->count(10)->withRelationships()->create();

        // Create Companies
        Company::factory()->count(5)->create();

        // Create Jobs with Skills
        Job::factory()->count(10)->withSkills()->create();

        // Create Events with Attendees
        Event::factory()->count(5)->withAttendees()->create();

        // Create Groups with Members
        Group::factory()->count(5)->withMembers()->create();

        // Create Skills
        Skill::factory()->count(15)->create();

        // Create Applications
        Application::factory()->count(10)->create();

        // Create Posts
        Post::factory()->count(20)->create();

        // Create Messages
        Message::factory()->count(15)->create();

        // Create Connections
        Connection::factory()->count(10)->create();

        // Create Notifications
        Notification::factory()->count(15)->create();

        // Create Comments
        Comment::factory()->count(30)->create();
    }
}
