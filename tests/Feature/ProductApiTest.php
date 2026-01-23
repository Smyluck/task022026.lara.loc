<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    #[Test]
    public function it_can_get_a_paginated_list_of_products(): void
    {

        Product::factory()->count(15)->create();

        $response = $this->getJson(route('products.index'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'price', 'category'],
            ],
            'meta',
        ]);

        $response->assertJsonCount(10, 'data');
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('meta.total', 15);
    }

    #[Test]
    public function it_can_store_a_new_product(): void
    {

        Sanctum::actingAs($this->user);
        $category = Category::factory()->create();
        $productData = [
            'name' => 'Монитор Asus',
            'description' => 'Монитор Asus kex tex',
            'price' => 199.99,
            'category_id' => $category->id,
        ];

        $response = $this->postJson(route('products.store'), $productData);

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('data.name', 'Монитор Asus');

        $this->assertDatabaseHas('products', $productData);
    }

    #[Test]
    public function it_returns_validation_errors_on_store_with_invalid_data(): void
    {
        Sanctum::actingAs($this->user);

        $invalidData = [
            'name' => '',
            'price' => 'не число',
        ];

        $response = $this->postJson(route('products.store'), $invalidData);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['name', 'price', 'category_id']);
    }

    #[Test]
    public function it_can_show_a_product()
    {

        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        $response = $this->getJson(route('products.show', $product->id));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'success' => true,
                'data' => [
                    'id' => $product->id,
                    'name' => $product->name,
                ],
            ]);
    }

    #[Test]
    public function it_returns_not_found_when_showing_a_non_existent_product(): void
    {

        $response = $this->getJson(route('products.show', 9999));

        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonPath('message', 'Товар не найден');
    }

    #[Test]
    public function it_can_delete_a_product(): void
    {
        Sanctum::actingAs($this->user);

        $product = Product::factory()->create();

        $response = $this->deleteJson(route('products.destroy', $product->id));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['success' => true]);

        $this->assertSoftDeleted('products', ['id' => $product->id]);

        $response = $this->getJson(route('products.show', $product->id));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonPath('data.id', $product->id);
    }

    #[Test]
    public function it_returns_not_found_when_deleting_a_non_existent_product(): void
    {
        Sanctum::actingAs($this->user);
        $response = $this->deleteJson(route('products.destroy', 9999));

        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonPath('message', 'Товар не найден');
    }

    #[Test]
    public function it_can_update_a_product(): void
    {
        Sanctum::actingAs($this->user);
        $product = Product::factory()->create();
        $updateData = [
            'name' => 'Обновленное имя',
            'price' => 500.00,
            'category_id' => $product->category_id,
        ];

        $response = $this->putJson(route('products.update', $product->id), $updateData);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonPath('data.name', 'Обновленное имя');

        $this->assertDatabaseHas('products', $updateData);
    }
}
