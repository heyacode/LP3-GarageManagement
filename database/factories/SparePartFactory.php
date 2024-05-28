<?php
namespace Database\Factories;

use App\Models\SparePart;
use Illuminate\Database\Eloquent\Factories\Factory;

class SparePartFactory extends Factory
{
    protected $model = SparePart::class;

    public function definition()
    {
        return [
            'partName' => fake()->word,
            'partReference' => fake()->unique()->bothify('??-####'),
            'supplier' => fake()->company,
            'price' => fake()->randomFloat(2, 10, 500),
        ];
    }
}


