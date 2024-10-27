<?php
namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a user for the post
            'content' => $this->faker->paragraphs(2, true), // Content (text, images, videos)
            'likes' => $this->faker->numberBetween(0, 100), // Random integer for likes
            'comments' => json_encode([]), // Initialize comments as an empty array
        ];
    }
}
