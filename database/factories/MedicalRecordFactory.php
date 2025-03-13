<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Goat;
use App\Models\MedicalRecord;

class MedicalRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicalRecord::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'goat_id' => Goat::factory(),
            'date' => fake()->date(),
            'type' => fake()->word(),
            'notes' => fake()->text(),
        ];
    }
}
