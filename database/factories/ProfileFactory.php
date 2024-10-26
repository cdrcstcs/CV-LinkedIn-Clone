<?php
namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a user for the profile
            'bio' => $this->faker->paragraph, // Bio
            'visibility' => $this->faker->randomElement(['public', 'private']), // Profile Visibility
            'current_position' => $this->faker->jobTitle, // Current Position
            'profile_url' => $this->faker->unique()->url, // Profile URL
        ];
    }
}
