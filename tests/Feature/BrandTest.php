<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Tests\TestCase;

class BrandTest extends TestCase
{
    public function test_access_endpoint_get_brands(): void
    {
        $response = $this->get('api/brands');
        $response->assertStatus(200);
    }
}
