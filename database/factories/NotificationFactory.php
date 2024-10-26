<?php
namespace Database\Factories;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a user for the notification
            'type' => $this->faker->randomElement(['connection_request', 'job_update', 'message']), // Type
            'content' => $this->faker->sentence, // Content
            'read_status' => $this->faker->boolean, // Read Status
        ];
    }
}
