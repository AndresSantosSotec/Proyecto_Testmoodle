<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\MoodleService;
use Tests\TestCase;
use Mockery;

class MoodleRoutesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $mock = Mockery::mock(MoodleService::class);
        $mock->shouldReceive('call')->andReturn([]);
        $this->app->instance(MoodleService::class, $mock);
    }

    public function test_moodle_routes_return_success(): void
    {
        foreach ([
            '/moodle/cursos',
            '/moodle/mis-cursos',
            '/moodle/categorias',
            '/moodle/usuarios',
        ] as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
