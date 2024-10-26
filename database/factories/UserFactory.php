<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
            'skills' => json_encode([$this->faker->word, $this->faker->word]), // Example array
            'education_history' => json_encode([]), // Example empty array
            'work_experience' => json_encode([]), // Example empty array
            'connections' => json_encode([]), // Example empty array
            'notifications' => json_encode([]), // Example empty array
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
}
