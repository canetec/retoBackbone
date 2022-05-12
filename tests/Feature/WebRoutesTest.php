<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class WebRoutesTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function testItThrowsNotFoundOnRootPath(): void
    {
        $response = $this->get('/');

        $response->assertNotFound();
    }
}
