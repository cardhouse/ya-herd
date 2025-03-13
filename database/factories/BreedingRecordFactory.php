<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BreedingRecord;
use App\Models\Goat;
use App\Models\Herd;

class BreedingRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BreedingRecord::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'herd_id' => Herd::factory(),
            'female_id' => Goat::factory(),
            'male_id' => Goat::factory(),
            'date' => fake()->date(),
            'notes' => fake()->text(),
        ];
    }
}
