<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_see_products(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_user_can_see_product_details(): void
    {
        $product = Product::first();

        $response = $this->get('/products/details/' . $product->id);

        $response->assertStatus(200);
    }

    /*--- admin ---*/
    public function get_admin()
    {
        // find user has role admin
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();
    }

    public function get_client()
    {
        // find user has role client
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->first();
    }

    public function test_admin_can_see_products(): void
    {
        $admin = $this->get_admin();
        $response = $this->actingAs($admin)->get('/admin/products');

        $response->assertStatus(200);
    }

    public function test_admin_can_store_product(): void
    {
        $admin = $this->get_admin();
        $product = Product::factory()->count(1)->make();
        $response = $this->actingAs($admin)->post('/admin/products/store', $product->toArray());

        $response->assertStatus(302);
    }

    public function test_client_can_not_store_product(): void
    {
        $client = $this->get_client();
        $product = Product::factory()->count(1)->make();
        $response = $this->actingAs($client)->post('/admin/products/store', $product->toArray());

        $response->assertStatus(403);
    }
}
