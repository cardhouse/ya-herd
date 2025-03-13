<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\FeedingSchedule;
use App\Models\Goat;
use App\Models\GoatNullable;
use App\Models\Herd;

class FeedingScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeedingSchedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'herd_id' => Herd::factory(),
            'goat_id' => Goat::factory(),
            'scheduled_at' => fake()->dateTime(),
            'details' => fake()->text(),
            'goat_nullable_id' => GoatNullable::factory(),
        ];
    }
}
