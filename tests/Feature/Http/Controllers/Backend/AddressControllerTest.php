<?php

namespace Tests\Feature\Http\Backend;

use Database\Factories\AddressFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Address;


class AddressControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_index_page(): void
    {
        $response = $this->get('/users/2/addresses');

        $response->assertStatus(200);
    }

    public function test_index_url_goes_to_correct_view()
    {
        $response = $this->get('/users/2/addresses');
        $response->assertViewIs('backend.addresses.index');
    }

    public function test_address_create_form_page_status()
    {
        $response = $this->get('/users/2/addresses/create');
        $response->assertOk();
    }

    public function test_address_create_form_goes_to_correct_view()
    {
        $response = $this->get('/users/2/addresses/create');
        $response->assertViewIs('backend.users.insert_form');
    }

    public function test_new_resource_is_created()
    {
        $adr = Address::factory()->make();
        $data = $adr->toArray();
        $response = $this->post('/users/2/addresses', $data);
        $response->assertRedirect('/users/2/addresses');
    }

    public function test_existing_resource_is_updated()
    {
        $entity = Address::all()->last();

        $entity->city = "CITY " . $entity->city;
        $entity->district = "DISTRICT " . $entity->district;

        $data = $entity->toArray();

        $response = $this->put('/users/2/addresses/' . $entity->address_id, $data);

        $response->assertRedirect('/users/2/addresses');
    }
}
