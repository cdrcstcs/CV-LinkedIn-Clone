<?php
namespace Database\Factories;

use App\Models\Job;
use App\Models\Company;
use App\Models\User;
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
            'skills_required' => json_encode([$this->faker->word, $this->faker->word]), // Skills Required (JSON)
            'posted_by' => User::factory(), // Create a user for the poster
        ];
    }
}
