<?php

namespace Database\Factories;

use App\Models\Conference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = now()->addMonths(6);
        $endsAt = (clone $startsAt)->addDays(3);
        $cfpStartsAt = now()->subMonths(1);
        $cfpEndsAt = (clone $cfpStartsAt)->addMonths(1);

        return [
            'title' => $this->faker->sentence(),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'cfp_starts_at' => $cfpStartsAt,
            'cfp_ends_at' => $cfpEndsAt,
        ];
    }
}
