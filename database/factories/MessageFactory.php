<?php
namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'sender_id' => User::factory(), // Create a user for sender
            'receiver_id' => User::factory(), // Create a user for receiver
            'content' => $this->faker->sentence, // Content
            'read_status' => $this->faker->boolean, // Read Status
        ];
    }
}
