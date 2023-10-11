<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create users
        User::factory()->create([
            'phone' => 'admin',
            'name' => 'Grupo Dinamita',
            'lastname' => 'Seminario',
            'email' => 'proyectos.grupodinamita@gmail.com',
        ]);
    }
}
