<?php
namespace Database\Factories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class SkillFactory extends Factory
{
    protected $model = Skill::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Ensure uniqueness
            'user_id' => User::factory(),
        ];
    }
}
