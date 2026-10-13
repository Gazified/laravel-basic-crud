<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_can_view_product_list(): void
    {
        $product = Product::create([
            'name' => 'apple',
            'qty' => 2,
            'price' => 5.00,
            'description' => 'fgdfg',
        ]);

        $response = $this->get('/product');

        $response->assertStatus(200);
        $response->assertSee('Product List');
        $response->assertSee('apple');
        $response->assertSee('₱5.00');
    }

    public function test_can_view_create_product_page(): void
    {
        $response = $this->get('/product/create');

        $response->assertStatus(200);
        $response->assertSee('Create a Product');
    }

    public function test_can_store_new_product(): void
    {
        $response = $this->post('/product', [
            'name' => 'orange',
            'qty' => 5,
            'price' => 12.50,
            'description' => 'Fresh oranges',
        ]);

        $response->assertRedirect('/product');
        $this->assertDatabaseHas('products', [
            'name' => 'orange',
            'qty' => 5,
        ]);
    }

    public function test_validation_rules_on_store(): void
    {
        $response = $this->post('/product', [
            'name' => '',
            'qty' => 'not-a-number',
            'price' => 'invalid-price',
        ]);

        $response->assertSessionHasErrors(['name', 'qty', 'price']);
    }

    public function test_can_view_edit_product_page(): void
    {
        $product = Product::create([
            'name' => 'banana',
            'qty' => 3,
            'price' => 2.50,
            'description' => 'Ripe bananas',
        ]);

        $response = $this->get("/product/{$product->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Edit Product');
        $response->assertSee('banana');
    }

    public function test_can_update_product(): void
    {
        $product = Product::create([
            'name' => 'banana',
            'qty' => 3,
            'price' => 2.50,
            'description' => 'Ripe bananas',
        ]);

        $response = $this->put("/product/{$product->id}/update", [
            'name' => 'green banana',
            'qty' => 6,
            'price' => 3.00,
            'description' => 'Unripe bananas',
        ]);

        $response->assertRedirect('/product');
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'green banana',
            'qty' => 6,
        ]);
    }

    public function test_can_delete_product(): void
    {
        $product = Product::create([
            'name' => 'grape',
            'qty' => 10,
            'price' => 4.00,
            'description' => 'Seedless grapes',
        ]);

        $response = $this->delete("/product/{$product->id}/destroy");

        $response->assertRedirect('/product');
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
