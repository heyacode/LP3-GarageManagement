<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Repair;
use App\Models\Invoice;
use App\Models\Vehicle;
use App\Models\SparePart;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // User::factory()->state([
        //     'username' => 'admin',
        //     'firstname' => 'Admin',
        //     'lastname' => 'User',
        //     'address' => '123 Admin St',
        //     'phone' => '123-456-7890',
        //     'role' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('123456'),
        // ])->create();
        User::factory()->state([
            'username' => 'mec',
            'firstname' => 'Mecanic',
            'lastname' => 'Mecanic',
            'address' => '123 Admin St',
            'phone' => '123-456-7890',
            'role' => 'mechanic',
            'email' => 'mechanic@mecanic.com',
            'password' => bcrypt('123456'),
        ])->create();
        User::factory()->state([
            'username' => 'clt',
            'firstname' => 'Client',
            'lastname' => 'Client',
            'address' => '123 Admin St',
            'phone' => '123-456-7890',
            'role' => 'client',
            'email' => 'client@client.com',
            'password' => bcrypt('123456'),
        ])->create();

        // Créer d'autres utilisateurs
        // User::factory(10)->create();
        // Vehicle::factory(10)->create();
        // SparePart::factory(20)->create();
        // Repair::factory(10)->create();
        // Invoice::factory(10)->create();

    }
}
