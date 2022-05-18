<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

/**
 * @internal
 * @covers \App\Http\Controllers\ZipCodeController
 */
final class ApiTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        $settlementType = SettlementType::create([
            'id' => 2,
            'name' => 'Pueblo',
        ]);
        $settlement = Settlement::create([
            'id' => 82,
            'name' => 'Santa Fe',
            'zone_type' => 'Urbano',
            'settlement_type_id' => $settlementType->id,
        ]);
        $federalEntity = FederalEntity::create([
            'id' => 9,
            'name' => 'Ciudad de Mexico',
            'code' => null,
        ]);
        $municipality = Municipality::create([
            'id' => 10,
            'name' => 'Alvaro Obregon',
        ]);
        ZipCode::create([
            'zip_code' => '01210',
            'locality' => 'Ciudad de Mexico',
            'federal_entity_id' => $federalEntity->id,
            'settlement_id' => $settlement->id,
            'municipality_id' => $municipality->id,
        ]);
    }

    /**
     * @covers \App\Http\Controllers\ZipCodeController::show()
     */
    public function testItRespondsAccordingToSpec(): void
    {
        $response = $this->get('/api/zip-codes/01210');

        $response->assertJson(
            [
                'zip_code' => '01210',
                'locality' => 'CIUDAD DE MEXICO',
                'federal_entity' => [
                    'key' => 9,
                    'name' => 'CIUDAD DE MEXICO',
                    'code' => null,
                ],
                'settlements' => [
                    [
                        'key' => 82,
                        'name' => 'SANTA FE',
                        'zone_type' => 'URBANO',
                        'settlement_type' => [
                            'name' => 'Pueblo',
                        ],
                    ],
                ],
                'municipality' => [
                    'key' => 10,
                    'name' => 'ALVARO OBREGON',
                ],
            ]
        );
    }
}
