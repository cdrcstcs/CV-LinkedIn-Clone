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
            // Removed members from here, will be handled in afterCreating
        ];
    }

    public function withMembers($count = 3)
    {
        return $this->afterCreating(function (Group $group) use ($count) {
            // Create and attach random users as members
            $members = User::factory()->count($count)->create();
            $group->members()->attach($members); // Attach members to the group
        });
    }
}
