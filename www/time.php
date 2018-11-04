<?php
// Инициализируем массив.
$arr = [];

// Заполняем массив в бесконечном цикле.
for ($i = 1; $i < 10000; $i++) {
    // Добавляем в массив один элемент.
    $arr[] = $i;

    // Определяем время выполнения скрипта при простом обходе массива.
    define('START_TIME_SIMPLE', microtime(true));
    foreach ($arr as $value) {
        echo $value;
    }
    $timeSimple = microtime(true) - START_TIME_SIMPLE;

    // Определяем время выполнения скрипта при применении итераторов.
    define('START_TIME_ITERATOR', microtime(true));
    $obj = new ArrayObject($arr);
    $it = $obj->getIterator();
    foreach ($it as $value) {
        echo $value;
    }
    $timeIterator = microtime(true) - START_TIME_ITERATOR;
    if(count($arr) > 100000) echo "1000000<br>";
    // Проверяем выгодность применения итераторов.
    if ($timeIterator < $timeSimple) {
        echo "<p>Применение итераторов выгодно при величине массива {$i} элементов.</p>";
        echo "<p>Время при простом обходе массива: {$timeSimple}</p>";
        echo "<p>Время при обходе массива c применением итератора: {$timeIterator}</p>";
        exit;
    }
}