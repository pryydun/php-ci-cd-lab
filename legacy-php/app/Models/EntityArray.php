<?php

// Індексний масив категорій одягу
$categories = [
    'Футболки',
    'Куртки',
    'Джинси',
    'Сукні',
    'Светри',
];

// Сортування за алфавітом
sort($categories);

// Асоціативний масив товару (клас Product)
$product = [
    'id' => 101,
    'name' => 'Зимова куртка',
    'description' => 'Тепла жіноча куртка',
    'brand' => 'Reserved',
    'isActive' => true,
];

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Інтернет-магазин одягу</title>
</head>
<body>

    <h2>Категорії одягу</h2>
    <ul>
        <?php foreach ($categories as $category) { ?>
            <li><?= htmlspecialchars($category) ?></li>
        <?php } ?>
    </ul>

    <h2>Інформація про товар</h2>
    <ul>
        <?php foreach ($product as $key => $value) { ?>
            <li>
                <?= htmlspecialchars($key) ?>:
                <?= htmlspecialchars(
                    is_bool($value)
                        ? ($value ? 'Так' : 'Ні')
                        : (string) $value
                ) ?>
            </li>
        <?php } ?>
    </ul>

</body>
</html>
