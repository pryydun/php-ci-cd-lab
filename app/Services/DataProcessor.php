<?php

declare(strict_types=1);

// Задача 1: сортування масиву за спаданням
function sortDescending(array $numbers): array
{
    rsort($numbers, SORT_NUMERIC);

    return $numbers;
}

// Задача 2: вибір трьох останніх слів рядка
function getLastThreeWords(string $text): string
{
    // Видаляємо пробіли на початку і в кінці
    $text = trim($text);

    if ($text === '') {
        return '';
    }

    // Розділяємо рядок на слова
    $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);

    // Вибираємо три останні слова
    $lastWords = array_slice($words, -3);

    // Об'єднуємо слова в рядок
    return implode(' ', $lastWords);
}

// Задача 3: перемішування символів у проміжних словах
function shuffleMiddleWords(string $text): string
{
    // Видаляємо зайві пробіли
    $text = trim($text);

    if ($text === '') {
        return '';
    }

    // Розділяємо рядок на слова
    $words = preg_split('/\s+/u', $text, -1, PREG_SPLIT_NO_EMPTY);

    if ($words === false || count($words) <= 2) {
        return $text;
    }

    // Перебираємо всі слова, крім першого й останнього
    for ($i = 1; $i < count($words) - 1; $i++) {

        // Розбиваємо слово на символи UTF-8
        $chars = preg_split(
            '//u',
            $words[$i],
            -1,
            PREG_SPLIT_NO_EMPTY
        );

        if ($chars === false) {
            continue;
        }

        // Перемішуємо символи
        shuffle($chars);

        // З'єднуємо символи назад у слово
        $words[$i] = implode('', $chars);
    }

    // Повертаємо готовий рядок
    return implode(' ', $words);
}
