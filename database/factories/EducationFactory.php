<?php
namespace Database\Factories;

use App\Models\Education;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class EducationFactory extends Factory
{
    protected $model = Education::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Assuming you have a User factory
            'institution' => $this->faker->company,
            'degree' => $this->faker->word,
            'field_of_study' => $this->faker->word,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
