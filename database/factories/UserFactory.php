<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $roles = ['client', 'mechanic'];
        $role = fake()->randomElement($roles);

        $adminExists = User::where('role', 'admin')->exists();
        if (!$adminExists) {
            $role = 'admin';
        }

        return [
            'username' => fake()->unique()->userName,
            'firstname' => fake()->firstName,
            'lastname' => fake()->lastName,
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'role' => $role,
            'email' => fake()->unique()->safeEmail,
            'password' => Hash::make('password'),
        ];
    }
}
