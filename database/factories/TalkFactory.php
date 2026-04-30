<?php

namespace Database\Factories;

use App\Models\Talk;
use App\Models\User;
use App\TalkType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::factory(),
            'title' => $this->faker->sentence(),
            'length' => $this->faker->randomElement(['30', '45', '60']),
            'type' => $this->faker->randomElement(TalkType::cases())->value,
            'abstract' => $this->faker->paragraph(),
            'organizer_notes' => $this->faker->paragraph(),
        ];
    }
}
