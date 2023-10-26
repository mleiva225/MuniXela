<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

// Needed for random values
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
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
        // Create 100 random items
        for ($i = 0; $i < 100; $i++) {
            $this->CreateRandomItem($i);
        }
    }

    private function CreateRandomItem(int $index)
    {
        $item = Item::create([
            'name' => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
            'code' => 'C-' . ++$index,
            'series' => 'S-' . ++$index,
            'quantity' => 1,
            'sicoin_gl' => Str::random(5),
            'unit_value' => 10,
            'description' => $this->faker->title,
            'observations' => Str::random(16),
        ]);
    }
}
