<?php
namespace Database\Factories;

use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Skill; // Import Skill model
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'company_id' => Company::factory(), // Create a company for the job
            'job_title' => $this->faker->jobTitle, // Job Title
            'description' => $this->faker->paragraph, // Description
            'location' => $this->faker->city, // Location
            'posted_by' => User::factory(), // Create a user for the poster
            'user_id' => User::factory(), // Make sure this is included
        ];
    }

    public function withSkills($count = 2)
    {
        return $this->afterCreating(function (Job $job) use ($count) {
            // Attach random skills to the job
            $skills = Skill::inRandomOrder()->take($count)->pluck('id'); // Get random skill IDs
            $job->skills()->attach($skills); // Attach the skills to the job
        });
    }
}
