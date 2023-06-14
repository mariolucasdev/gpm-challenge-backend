<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\{RefreshDatabase, WithFaker};
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ApplianceTest extends TestCase
{
    public function test_create_appliance_expect_code_201_and_json_product(): void
    {
        $response = $this->json('POST', 'api/appliance', [
            'name'            => 'Geladeira Frost Free',
            'description'     => 'Produto versátil.',
            'eletric_tension' => '220v',
            'brand_id'        => 1,
        ]);

        $response->assertStatus(201);

        $response
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('name', 'Geladeira Frost Free')
                    ->where('description', 'Produto versátil.')
                    ->where('eletric_tension', '220v')
                    ->where('brand_id', 1)
                    ->etc()
            );
    }

    public function test_missed_field_required_expect_error_422_and_correctly_message(): void
    {
        $response = $this->json('POST', 'api/appliance', [
            // 'name'            => 'Geladeira Frost Free',
            'description'     => 'Produto versátil.',
            'eletric_tension' => '220v',
            'brand_id'        => 1,
        ]);

        $response->assertStatus(422);
        $response->assertUnprocessable();
    }

    public function test_list_appliances_expect_status_code_200(): void
    {
        $response = $this->get('api/appliance');
        $response->assertOk();
    }
}
