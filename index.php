<?php

declare(strict_types=1);
use Faker\Factory;

require_once __DIR__.'/app/Services/EntityService.php';
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/app/Services/DataProcessor.php';

// Завдання 2: обчислення вартості
$price = 799.50;
$quantity = 2;
$total = calculateTotal($price, $quantity);

// Завдання 3: генерація випадкових цін
$faker = Factory::create();

$prices = [];

for ($i = 0; $i < 10; $i++) {
    $prices[] = $faker->randomFloat(2, 100, 3000);
}

// Фільтрація цін
$minThreshold = 500;

$filteredPrices = array_filter(
    $prices,
    function ($price) use ($minThreshold) {
        return $price > $minThreshold;
    }
);

// Завдання 4: обробка винятків
try {
    // Навмисно некоректна знижка 150%
    $discountResult = applyDiscount(1000.0, 150.0);

    $discountMessage = 'Ціна зі знижкою: '
        .$discountResult.' грн';
} catch (Exception $e) {
    // Перехоплення винятку
    $discountMessage = 'Помилка: '.$e->getMessage();
} finally {
    // Виконується завжди
    $finalMessage = 'Спробу розрахунку завершено.';
}

// Завдання 5, задача 1: сортування масиву
$numbers = [12, -4, 7, 0, 12, 3];
$sortedNumbers = sortDescending($numbers);

// Завдання 5, задача 2: три останні слова рядка
$inputText = 'У магазині є нові зимові куртки';
$lastThreeWords = getLastThreeWords($inputText);

// Завдання 5, задача 3: перемішування символів
$shuffleInput = 'Наш магазин продає теплий одяг';
$shuffledText = shuffleMiddleWords($shuffleInput);

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №3</title>
</head>
<body>

    <h2>Розрахунок вартості замовлення</h2>

    <p>Ціна товару: <?= $price ?> грн</p>
    <p>Кількість: <?= $quantity ?></p>
    <p>
        Загальна вартість:
        <?= number_format($total, 2, '.', ' ') ?> грн
    </p>

    <h2>Початкові ціни товарів</h2>

    <ul>
        <?php foreach ($prices as $itemPrice) { ?>
            <li>
                <?= number_format($itemPrice, 2, '.', ' ') ?> грн
            </li>
        <?php } ?>
    </ul>

    <h2>Товари дорожчі за 500 грн</h2>

    <ul>
        <?php foreach ($filteredPrices as $itemPrice) { ?>
            <li>
                <?= number_format($itemPrice, 2, '.', ' ') ?> грн
            </li>
        <?php } ?>
    </ul>

    <h2>Обробка винятків</h2>

    <p><?= htmlspecialchars($discountMessage) ?></p>
    <p><?= htmlspecialchars($finalMessage) ?></p>

    <h2>Завдання 5. Задача 1 — Сортування масиву</h2>

    <p>
        Початковий масив:
        <?= implode(', ', $numbers) ?>
    </p>

    <p>
        Відсортований масив:
        <?= implode(', ', $sortedNumbers) ?>
    </p>

    <h2>Завдання 5. Задача 2 — Три останні слова</h2>

    <p>
        Початковий рядок:
        <?= htmlspecialchars($inputText) ?>
    </p>

    <p>
        Три останні слова:
        <?= htmlspecialchars($lastThreeWords) ?>
    </p>

    <h2>Завдання 5. Задача 3 — Перемішування символів</h2>

    <p>
        Початковий рядок:
        <?= htmlspecialchars($shuffleInput) ?>
    </p>

    <p>
        Результат перемішування:
        <?= htmlspecialchars($shuffledText) ?>
    </p>

</body>
</html>


