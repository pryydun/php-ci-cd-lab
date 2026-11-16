<?php

declare(strict_types=1);
use App\Core\Database;
use App\Core\EntityFactory;
use App\Services\ConsoleLogger;
use App\Services\EntityService;
use App\Services\FileLogger;
use App\Tasks\Artist;
use App\Tasks\Car;
use App\Tasks\ExpressTrain;
use App\Tasks\Genre;
use App\Tasks\Train;
use App\Tasks\Worker;

require_once __DIR__.'/vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Лабораторна робота №4</title>
</head>
<body>

<h1>Лабораторна робота №4 — ООП у PHP</h1>

<h2>1. Singleton</h2>
<pre>
<?php
$db1 = Database::getInstance();
$db2 = Database::getInstance();

echo 'Same instance: ',
$db1 === $db2 ? 'Yes' : 'No',
PHP_EOL;
?>
</pre>

<h2>2. Factory та наслідування</h2>
<pre>
<?php
$product = EntityFactory::createEntity('product', [
    'id' => '1',
    'createdAt' => '2026-11-16',
    'name' => 'Куртка',
    'price' => 1500.0,
]);

$user = EntityFactory::createEntity('user', [
    'id' => '2',
    'createdAt' => '2026-11-16',
    'name' => 'Вікторія',
]);

echo $product->getDetails(), PHP_EOL;
echo $user->getDetails(), PHP_EOL;
?>
</pre>

<h2>3. Інтерфейси та трейти — JSON</h2>
<pre>
<?= htmlspecialchars($product->exportToJson()) ?>
</pre>

<h2>4. Dependency Injection</h2>
<pre>
<?php
$consoleService = new EntityService(
    new ConsoleLogger
);
$consoleService->process($product);

$fileService = new EntityService(
    new FileLogger
);
$fileService->process($user);
?>
</pre>

<h2>5. Artist та Genre</h2>
<pre>
<?php
$genre = new Genre(1, 'Rock');

$genre->addArtist(
    new Artist(1, 'Queen', true, 1970)
);
$genre->addArtist(
    new Artist(2, 'Sting', false, 1977)
);

echo 'Artists: ', count($genre->getArtists()), PHP_EOL;
echo 'Found Queen: ',
count($genre->searchArtist('Queen')), PHP_EOL;

$genre->removeArtist(2);

echo 'After removal: ',
count($genre->getArtists()), PHP_EOL;
?>
</pre>

<h2>6. Ієрархія транспортних засобів</h2>
<pre>
<?php
$vehicles = [
    new Car,
    new Train,
    new ExpressTrain,
];

foreach ($vehicles as $vehicle) {
    echo (new ReflectionClass($vehicle))->getShortName(),
    ': ',
    $vehicle->calculateTravelTime(300.0),
    ' год',
    PHP_EOL;
}
?>
</pre>

<h2>7. Worker — розрахунок зарплати</h2>
<pre>
<?php
$worker = new Worker(
    15000.0,
    120,
    250.0
);

echo 'Salary: ',
$worker->calculateSalary(),
' грн',
PHP_EOL;
?>
</pre>

</body>
</html>



