<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    // Тимчасові товари в кошику
    private array $items = [
        [
            'product_id' => 1,
            'name' => 'Жіноча куртка',
            'price' => 2500.00,
            'quantity' => 1,
        ],
        [
            'product_id' => 2,
            'name' => 'Футболка',
            'price' => 650.00,
            'quantity' => 2,
        ],
    ];

    // Перегляд кошика та розрахунок суми
    public function index(): JsonResponse
    {
        $total = 0;
        $totalQuantity = 0;

        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
            $totalQuantity += $item['quantity'];
        }

        return response()->json([
            'status' => 'success',
            'items' => $this->items,
            'total_quantity' => $totalQuantity,
            'total_amount' => $total,
        ], 200);
    }
}
