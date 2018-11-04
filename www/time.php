<?php
// Инициализируем массив.
$arr = [];

// Заполняем массив в бесконечном цикле.
for ($i = 0; true; $i++) {
    // Добавляем в массив один элемент.
    $arr[] = $i;

    // Определяем время выполнения скрипта при простом обходе массива.
    define('START_TIME_SIMPLE', microtime(true));
    foreach ($arr as $value) {
        $value += $value;
    }
    $timeSimple = microtime(true) - START_TIME_SIMPLE;

    // Определяем время выполнения скрипта при применении итераторов.
    define('START_TIME_ITERATOR', microtime(true));
    $obj = new ArrayObject($arr);
    $it = $obj->getIterator();
    foreach ($it as $value) {
        $value += $value;
    }
    $timeIterator = microtime(true) - START_TIME_ITERATOR;

    // Проверяем выгодность применения итераторов.
    if ($timeIterator < $timeSimple) {
        echo "Применение итераторов выгодно при величине массива {$i} элементов.<br>";
        echo "Время при простом обходе массива: {$timeSimple}<br>";
        echo "Время при обходе массива c применением итератора: {$timeIterator}<br>";
        return;
    }
}