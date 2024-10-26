<?php
namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // Title
            'description' => $this->faker->paragraph, // Description
            'date_time' => $this->faker->dateTimeBetween('+1 week', '+1 month'), // Date & Time
            'location' => $this->faker->address, // Location
            'host_user_id' => User::factory(), // Host User ID
            'attendees' => json_encode([]), // Attendees (initially empty)
        ];
    }
}
