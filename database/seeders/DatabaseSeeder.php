<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Connection;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Job;
use App\Models\Company;
use App\Models\Application;
use App\Models\Notification;
use App\Models\Skill;
use App\Models\Endorsement;
use App\Models\Event;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed Users
        $users = User::factory(10)->create();

        // Seed Profiles
        foreach ($users as $user) {
            Profile::factory()->create(['user_id' => $user->id]);
        }

        // Seed Connections
        foreach ($users as $user) {
            foreach ($users->where('id', '!=', $user->id)->random(3) as $connectionUser) {
                Connection::factory()->create([
                    'user_id_1' => $user->id,
                    'user_id_2' => $connectionUser->id,
                    'status' => 'accepted',
                ]);
            }
        }

        // Seed Posts
        foreach ($users as $user) {
            Post::factory(random_int(1, 5))->create(['user_id' => $user->id]);
        }

        // Seed Comments
        Post::all()->each(function ($post) use ($users) {
            foreach ($users->random(random_int(1, 3)) as $user) {
                Comment::factory()->create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                ]);
            }
        });

        // Seed Messages
        foreach ($users as $sender) {
            foreach ($users->where('id', '!=', $sender->id)->random(2) as $receiver) {
                Message::factory()->create([
                    'sender_id' => $sender->id,
                    'receiver_id' => $receiver->id,
                ]);
            }
        }

        // Seed Jobs
        $companies = Company::factory(5)->create();
        foreach ($companies as $company) {
            Job::factory(random_int(1, 3))->create(['company_id' => $company->id]);
        }

        // Seed Applications
        $jobs = Job::all();
        foreach ($users as $user) {
            foreach ($jobs->random(random_int(1, 3)) as $job) {
                Application::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id,
                    'status' => 'applied',
                ]);
            }
        }

        // Seed Notifications
        foreach ($users as $user) {
            Notification::factory(random_int(1, 5))->create(['user_id' => $user->id]);
        }

        // Seed Skills
        $skills = Skill::factory(10)->create();
        foreach ($users as $user) {
            foreach ($skills->random(random_int(1, 3)) as $skill) {
                $user->skills()->attach($skill->id);
            }
        }

        // Seed Endorsements
        foreach ($skills as $skill) {
            foreach ($users->random(random_int(1, 3)) as $endorser) {
                Endorsement::factory()->create([
                    'user_id' => $endorser->id,
                    'skill_id' => $skill->id,
                ]);
            }
        }

        // Seed Events
        foreach ($users as $host) {
            Event::factory()->create([
                'host_user_id' => $host->id,
                'attendees' => $users->random(random_int(1, 5))->pluck('id')->toArray(),
            ]);
        }

        // Seed Groups
        foreach ($users as $admin) {
            Group::factory()->create([
                'admin_user_id' => $admin->id,
                'members' => $users->random(random_int(1, 5))->pluck('id')->toArray(),
            ]);
        }
    }
}
