<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

// Needed for random values
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
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
        Item::create([
            'name' => Str::random(10),
            'code' => 'C-' . ++$index,
            'series' => 'S-' . ++$index,
            'quantity' => 1,
            'sicoin_gl' => Str::random(5),
            'unit_value' => 10,
            'description' => Str::random(16) . '. ' . Str::random(16),
            'observations' => Str::random(16),
        ]);
    }
}
