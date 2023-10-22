<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// Needed for random values
use Illuminate\Support\Str;

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
            'admin' => true,
        ]);

        // Create 20 random users
        for ($i = 0; $i < 20; $i++) {
            $this->CreateRandomUser($i);
        }
    }

    private function CreateRandomUser(int $index)
    {
        User::factory()->create([
            'phone' => 'user-' . ++$index,
            'name' => Str::random(4),
            'lastname' => Str::random(8),
            'email' => Str::random(8) . '@random.com',
            'admin' => true
        ]);
    }
}
