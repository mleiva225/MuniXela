<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class UserSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

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
            $this->CreateRandomUser();
        }
    }

    private function CreateRandomUser()
    {
        User::factory()->create([
            'phone' => $this->faker->phoneNumber,
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->email,
            'admin' => true,
            'birthdate' => $this->faker->dateTimeBetween('01-01-1995', '31-12-2005')
        ]);
    }
}
