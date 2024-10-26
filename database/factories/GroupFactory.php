<?php
namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company, // Name
            'description' => $this->faker->paragraph, // Description
            'admin_user_id' => User::factory(), // Admin User ID
            'members' => json_encode([]), // Members (initially empty)
        ];
    }
}
