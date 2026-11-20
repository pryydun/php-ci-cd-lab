<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ProductAccessTest extends TestCase
{
    // Тест 1: Отримання списку товарів — 200
    public function test_get_products_returns_200(): void
    {
        $response = $this->getJson('/products');

        $response->assertStatus(200)
            ->assertJson(['status' => 'success'])
            ->assertJsonCount(2, 'data');
    }

    // Тест 2: Неіснуючий товар — 404
    public function test_nonexistent_product_returns_404(): void
    {
        $response = $this->getJson('/products/999');

        $response->assertStatus(404)
            ->assertJson([
                'status' => 'error',
                'message' => 'Товар не знайдено',
            ]);
    }

    // Тест 3: POST без заголовка — 403
    public function test_post_without_header_returns_403(): void
    {
        $response = $this->postJson('/products', [
            'name' => 'Жіноча сукня',
            'description' => 'Літня сукня',
            'brand' => 'Zara',
            'price' => 1200,
        ]);

        $response->assertStatus(403)
            ->assertJson([
                'status' => 'access_denied',
            ]);
    }

    // Тест 4: Успішне створення товару — 201
    public function test_post_with_header_returns_201(): void
    {
        $response = $this->withHeaders([
            'X-App-Client' => 'ClothingStoreClient',
        ])->postJson('/products', [
            'name' => 'Жіноча сукня',
            'description' => 'Літня сукня',
            'brand' => 'Zara',
            'price' => 1200,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'status' => 'created',
                'data' => [
                    'name' => 'Жіноча сукня',
                    'brand' => 'Zara',
                ],
            ])
            ->assertHeader('X-Security-Policy', 'Enforced');
    }

    // Тест 5: Відсутнє обов'язкове поле — 422
    public function test_invalid_product_returns_422(): void
    {
        $response = $this->withHeaders([
            'X-App-Client' => 'ClothingStoreClient',
        ])->postJson('/products', [
            'description' => 'Літня сукня',
            'brand' => 'Zara',
            'price' => 1200,
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }
}
