<?php
namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company, // Company Name
            'industry' => $this->faker->word, // Industry
            'location' => $this->faker->city, // Location
            'description' => $this->faker->paragraph, // Description
            'logo' => $this->faker->imageUrl(), // Logo (URL)
            'website' => $this->faker->url, // Website
        ];
    }
}
