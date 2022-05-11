<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settlement>
 */
class SettlementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(asText: true),
            'zone_type' => $this->faker->word,
            'settlement_type' => $this->faker->word,
        ];
    }
}
