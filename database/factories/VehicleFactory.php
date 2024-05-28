<?php
namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition()
    {
        return [
            'mark' => fake()->company,
            'model' => fake()->word,
            'fuelType' => fake()->randomElement(['Gasoline', 'Diesel', 'Electric']),
            'registration' => fake()->unique()->bothify('??-####-##'),
            'photo' => fake()->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}

