<?php

namespace Tests\Feature;

use App\Models\Appliance;
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

    public function test_missed_name_field_required_expect_error_422_and_correctly_message(): void
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

    public function test_update_appliance_expect_status_code_200(): void
    {
        $appliance = Appliance::first();

        $response = $this->json('PUT', 'api/appliance/' . $appliance->id, [
            'name'            => 'Cooktop 05 bocas',
            'description'     => 'Elétrico.',
            'eletric_tension' => '110v',
            'brand_id'        => 2,
        ]);

        $response->assertStatus(200);

        $response
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('name', 'Cooktop 05 bocas')
                    ->where('description', 'Elétrico.')
                    ->where('eletric_tension', '110v')
                    ->where('brand_id', 2)
                    ->etc()
            );
    }

    public function test_fail_update_not_exists_appliance_expect_status_code_404(): void
    {
        $response = $this->json('PUT', 'api/appliance/11000', [
            'name'            => 'Cooktop 05 bocas',
            'description'     => 'Elétrico.',
            'eletric_tension' => '110v',
            'brand_id'        => 2,
        ]);

        $response->assertStatus(404);
    }

    public function test_destroy_appliance_expect_code_200(): void
    {
        $appliance = Appliance::first();
        $response  = $this->delete('api/appliance/' . $appliance->id);

        $response->assertOk();

        $response = $this->delete('api/appliance/' . $appliance->id);

        $response->assertStatus(404);
    }

    public function test_destroy_not_exist_appliance_expect_code_404(): void
    {
        $response = $this->delete('api/appliance/1000000');

        $response->assertStatus(404);
    }
}
