<?php
namespace Database\Factories;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'job_id' => Job::factory(), // Create a job for the application
            'user_id' => User::factory(), // Create a user for the application
            'status' => $this->faker->randomElement(['applied', 'interviewed', 'offered', 'rejected']), // Status
        ];
    }
}
