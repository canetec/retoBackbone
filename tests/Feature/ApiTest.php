<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class ApiTest extends TestCase
{
    // use DatabaseMigrations;
    use DatabaseTransactions;

    public function testBasic(): void
    {
        $response = $this->get('/api/01210');

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
