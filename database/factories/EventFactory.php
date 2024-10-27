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
            // Removed attendees from here; will be handled in afterCreating
        ];
    }

    public function withAttendees($count = 3)
    {
        return $this->afterCreating(function (Event $event) use ($count) {
            // Create and attach random users as attendees
            $attendees = User::factory()->count($count)->create();
            $event->attendees()->attach($attendees); // Attach attendees to the event
        });
    }
}
