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
use App\Models\Endorsement;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Users with Relationships
        User::factory()->count(2)->withRelationships()->create();

        Profile::factory()->count(2)->create();

        // Create Companies
        Company::factory()->count(2)->create();

        // Create Jobs with Skills
        Job::factory()->count(2)->withSkills()->create();

        // Create Events with Attendees
        Event::factory()->count(2)->withAttendees()->create();

        // Create Groups with Members
        Group::factory()->count(2)->withMembers()->create();

        // Create Skills
        Skill::factory()->count(2)->create();

        // Create Applications
        Application::factory()->count(2)->create();

        // Create Posts with Comments
        Post::factory()->count(2)->withComments(2)->create(); // Creates 2 comments for each post

        // Create Messages
        Message::factory()->count(2)->create();

        // Create Connections
        Connection::factory()->count(2)->create();

        Endorsement::factory()->count(2)->create();

        // Create Notifications
        Notification::factory()->count(2)->create();

    }
}
