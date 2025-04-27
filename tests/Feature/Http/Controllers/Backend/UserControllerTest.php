<?php

namespace Tests\Feature\Http\Controllers\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Container\Container;
use Faker\Generator;
use App\Models\User;


class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */


    use RefreshDatabase;
    public function test_users_index_page_status()
    {
        $response = $this->get('/users'); // sadece /users yazıyoruz
        $response->assertOk(); // 200 dönerse test geçer
    }

    public function test_users_index_url_goes_to_correct_view()
    {
        $response = $this->get('/users');
        $response->assertViewIs('backend.users.index');
    }

    public function test_users_create_form_page_status()
    {
        $response = $this->get('/users/create');
        $response->assertOk();
    }

    public function test_users_create_form_goes_to_correct_view()
    {
        $response = $this->get('/users/create');
        $response->assertViewIs('backend.users.insert_form');
    }

    public function test_users_new_resource_is_created()
    {
        $generator = Container::getInstance()->make(Generator::class);

        $data = [
            'name' => $generator->name,
            'email' => $generator->email,
            'password' => '123456',
            'password_confirmation' => '123456',
            'is_admin' => $generator->boolean,
            'is_active' => $generator->boolean,
        ];

        $response = $this->post('/users', $data);
        $response->assertRedirect('/users');
    }


    public function test_users_existing_user_is_updated()
    {
        $user = User::factory()->create(); // ✅ Test için bir kullanıcı yaratıyoruz

        $user = User::all()->last();

        $user->name = "UPDATED " . $user->name;
        $user->email = "email" . $user->email;

        $data = $user->toArray();

        $response = $this->put('/users/' . $user->user_id, $data);
        $response->assertRedirect('/users');
    }
}
