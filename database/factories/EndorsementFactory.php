<?php
namespace Database\Factories;

use App\Models\Endorsement;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EndorsementFactory extends Factory
{
    protected $model = Endorsement::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // User being endorsed
            'skill_id' => Skill::factory(), // Skill being endorsed
            'endorser_id' => User::factory(), // Endorser
        ];
    }
}
