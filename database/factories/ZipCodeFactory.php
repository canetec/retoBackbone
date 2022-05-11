<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ZipCode>
 */
class ZipCodeFactory extends Factory
{
    public function definition()
    {
        return [
            'zip_code' => $this->faker->postcode,
            'locality' => $this->faker->city,
            'federal_entity_id' => FederalEntity::factory(),
            'settlement_id' => Settlement::factory(),
            'municipality_id' => Municipality::factory(),
        ];
    }
}
