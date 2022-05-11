<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FederalEntity>
 */
class FederalEntityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'code' => random_int(0, getrandmax()) > 0.5 ? $this->faker->word() : null,
        ];
    }
}
