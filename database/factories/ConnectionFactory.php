<?php
namespace Database\Factories;

use App\Models\Connection;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConnectionFactory extends Factory
{
    protected $model = Connection::class;

    public function definition()
    {
        return [
            'user_id_1' => User::factory(), // Create a user for user_id_1
            'user_id_2' => User::factory(), // Create a user for user_id_2
            'status' => $this->faker->randomElement(['pending', 'accepted', 'declined']), // Status
        ];
    }
}
