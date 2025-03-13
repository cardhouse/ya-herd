<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Goat;
use App\Models\Herd;

class GoatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Goat::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'herd_id' => Herd::factory(),
            'name' => fake()->name(),
            'breed' => fake()->word(),
            'sex' => fake()->randomElement(["M","F"]),
            'date_of_birth' => fake()->date(),
        ];
    }
}
