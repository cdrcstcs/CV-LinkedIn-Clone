<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Education; // Import the Education model
use App\Models\Skill;     // Import the Skill model
use App\Models\Job;       // Import the Job model

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // or Hash::make('password')
            'profile_picture' => null,
            'headline' => $this->faker->sentence,
            'summary' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'industry' => $this->faker->word,
            // We will generate related records separately
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    // Create users with relationships
    public function withRelationships()
    {
        return $this->afterCreating(function (User $user) {
            // Create random educations
            Education::factory()->count(rand(1, 3))->create(['user_id' => $user->id]);

            // Create random skills
            Skill::factory()->count(rand(1, 5))->create(['user_id' => $user->id]);

            // Create random jobs
            Job::factory()->count(rand(1, 3))->create(['user_id' => $user->id]);
        });
    }
}
