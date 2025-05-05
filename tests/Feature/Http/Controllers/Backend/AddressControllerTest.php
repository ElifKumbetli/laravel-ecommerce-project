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
        $user = User::create([
            'user_id' => 2,
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->actingAs($user);

        $data = [
            "user_id" => 2,
            "city" => "Çanakkale",
            "district" => "Lapseki",
            "zipcode" => "17888",
            "address" => "Açık adres alanıdır",
            "is_default" => false,
        ];

        $response = $this->post("/users/2/addresses", $data);
        $response->assertRedirect("/users/2/addresses");
    }



    public function test_existing_resource_is_updated()
    {
        // 1. Önce user oluştur
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Kullanıcıya bir adres oluştur
        $address = Address::create([
            'user_id' => $user->getKey(), // user_id olacak
            'city' => 'İstanbul',
            'district' => 'Kadıköy',
            'zipcode' => '34000',
            'address' => 'Test adresi',
            'is_default' => false,
        ]);

        // 3. Değişiklik yap
        $address->city = 'CITY ' . $address->city;
        $address->district = 'DISTRICT ' . $address->district;

        $data = $address->toArray();

        $this->actingAs($user); // Oturum açmayı unutma

        // 4. PUT isteği gönder
        $response = $this->put('/users/' . $user->getKey() . '/addresses/' . $address->address_id, $data);

        // 5. Beklenen yönlendirmeyi kontrol et
        $response->assertRedirect('/users/' . $user->getKey() . '/addresses');
    }
}
