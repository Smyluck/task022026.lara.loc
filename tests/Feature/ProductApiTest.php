<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase; // Очищает базу данных после каждого теста

    #[Test]
    public function it_can_get_a_paginated_list_of_products(): void
    {
        // Arrange: Создаем 15 продуктов
        Product::factory()->count(15)->create();

        // Act: Делаем GET-запрос к API
        $response = $this->getJson(route('products.index'));

        // Assert: Проверяем результат
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'price', 'category'],
            ],
            'meta',
        ]);
        // По умолчанию пагинация на 10 элементов
        $response->assertJsonCount(10, 'data');
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('meta.total', 15);
    }

    #[Test]
    public function it_can_store_a_new_product(): void
    {
        // Arrange: Создаем категорию и данные для нового продукта
        $category = Category::factory()->create();
        $productData = [
            'name' => 'Монитор Asus',
            'description' => 'Монитор Asus kex tex',
            'price' => 199.99,
            'category_id' => $category->id,
        ];

        // Act: Делаем POST-запрос на создание
        $response = $this->postJson(route('products.store'), $productData);

        // Assert: Проверяем результат
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('data.name', 'Монитор Asus');

        // Проверяем, что продукт действительно появился в БД
        $this->assertDatabaseHas('products', $productData);
    }

    #[Test]
    public function it_returns_validation_errors_on_store_with_invalid_data(): void
    {
        // Arrange: Неполные данные
        $invalidData = [
            'name' => '',
            'price' => 'не число',
        ];

        // Act
        $response = $this->postJson(route('products.store'), $invalidData);

        // Assert
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['name', 'price', 'category_id']);
    }

    #[Test]
    public function it_can_show_a_product()
    {
        // Создаём категорию и товар
        $category = Category::factory()->create();
        $product = Product::factory()->create(['category_id' => $category->id]);

        // Делаем GET-запрос для конкретного товара
        $response = $this->getJson(route('products.show', $product->id));

        // Проверяем ответ
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
        // Act
        $response = $this->getJson(route('products.show', 9999)); // Несуществующий ID

        // Assert
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonPath('message', 'Товар не найден');
    }

    #[Test]
    public function it_can_delete_a_product(): void
    {
        // Arrange: Создаем и "мягко удаляем" продукт
        $product = Product::factory()->create();
        // Act
        $response = $this->deleteJson(route('products.destroy', $product->id));

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson(['success' => true]);

        // Проверяем, что запись помечена как удаленная, а не удалена физически
        $this->assertSoftDeleted('products', ['id' => $product->id]);

        // Act: show использует withTrashed, поэтому должен найти
        $response = $this->getJson(route('products.show', $product->id));

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonPath('data.id', $product->id);
    }

    #[Test]
    public function it_returns_not_found_when_deleting_a_non_existent_product(): void
    {
        // Act
        $response = $this->deleteJson(route('products.destroy', 9999));

        // Assert
        $response->assertStatus(Response::HTTP_NOT_FOUND);
        $response->assertJsonPath('message', 'Товар не найден');
    }

    #[Test]
    public function it_can_update_a_product(): void
    {
        // Arrange
        $product = Product::factory()->create();
        $updateData = [
            'name' => 'Обновленное имя',
            'price' => 500.00,
            'category_id' => $product->category_id, // category_id обязателен по валидации
        ];

        // Act
        $response = $this->putJson(route('products.update', $product->id), $updateData);

        // Assert
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonPath('data.name', 'Обновленное имя');

        $this->assertDatabaseHas('products', $updateData);
    }
}
