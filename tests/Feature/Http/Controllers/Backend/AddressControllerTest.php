<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Address;
use App\Models\User;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_status()
    {
        $user = User::factory()->create(); // test veritabanına kullanıcı ekle
        $this->actingAs($user); // kullanıcıyı giriş yapmış gibi ayarla

        $response = $this->get(route('addresses.index', ['user' => $user]));
        $response->assertStatus(200); // sayfa başarıyla açılmalı
    }



    public function test_index_url_goes_to_correct_view()
    {
        $user = User::factory()->create(); // Kullanıcı oluştur
        $this->actingAs($user); // Gerekirse oturum aç
        $response = $this->get("/users/{$user->user_id}/addresses");
        $response->assertViewIs('backend.addresses.index');
    }

    public function test_address_create_form_page_status()
    {
        $user = User::factory()->create(); // Test için kullanıcı oluştur
        $this->actingAs($user); // Gerekirse oturum aç

        $response = $this->get("/users/{$user->user_id}/addresses/create");
        $response->assertOk(); // Sayfa 200 OK döndürmeli
    }


    public function test_address_create_form_goes_to_correct_view()
    {
        $user = User::factory()->create(); // Test kullanıcı oluştur
        $this->actingAs($user); // Gerekirse oturum aç

        $response = $this->get("/users/{$user->user_id}/addresses/create");
        $response->assertViewIs('backend.addresses.insert_form'); // Doğru view yüklenmiş mi?
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
