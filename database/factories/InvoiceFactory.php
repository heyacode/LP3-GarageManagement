<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Repair;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'repairId' => Repair::factory(),
            'additionalCharges' => fake()->randomFloat(2, 10, 100),
            'totalAmount' => fake()->randomFloat(2, 100, 1000),
        ];
    }
}

