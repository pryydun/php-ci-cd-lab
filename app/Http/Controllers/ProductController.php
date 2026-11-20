<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Тимчасове сховище товарів
    private array $products = [
        [
            'id' => 1,
            'name' => 'Жіноча куртка',
            'description' => 'Тепла зимова куртка',
            'brand' => 'Reserved',
            'price' => 2500.00,
            'isActive' => true,
        ],
        [
            'id' => 2,
            'name' => 'Футболка',
            'description' => 'Бавовняна футболка',
            'brand' => 'Zara',
            'price' => 650.00,
            'isActive' => true,
        ],
    ];

    // Отримання списку товарів
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $this->products,
        ], 200);
    }

    // Перегляд товару за ID
    public function show(string $id): JsonResponse
    {
        foreach ($this->products as $product) {
            if ($product['id'] === (int) $id) {
                return response()->json([
                    'status' => 'success',
                    'data' => $product,
                ], 200);
            }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Товар не знайдено',
        ], 404);
    }

    // Створення нового товару
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'description' => ['required', 'string'],
            'brand' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $newProduct = [
            'id' => count($this->products) + 1,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'brand' => $validated['brand'],
            'price' => (float) $validated['price'],
            'isActive' => true,
        ];

        $this->products[] = $newProduct;

        return response()->json([
            'status' => 'created',
            'data' => $newProduct,
        ], 201);
    }
}
