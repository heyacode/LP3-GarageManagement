<?php
namespace Database\Factories;

use App\Models\Repair;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class RepairFactory extends Factory
{
    protected $model = Repair::class;

    public function definition()
    {
        return [
            'description' => fake()->sentence,
            'status' => fake()->randomElement(['en attente','en cours', 'terminé']),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'mecanicNotes' => fake()->paragraph,
            'clientNotes' => fake()->paragraph,
            'mecanicId' => User::factory()->state(['role' => 'mechanic']),
            'vehicleId' => Vehicle::factory(),
        ];
    }
}


