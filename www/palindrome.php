<?php
/**
 * Created by PhpStorm.
 * User: Andrey Bogan
 * Date: 18.11.2018
 */

// Исходная строка.
$stringOriginal = "Казак";

// Переводим все символы строки в нижний регистр и если есть пробелы, то убираем их.
$string = mb_strtolower(str_replace(' ', '', $stringOriginal));

// Преобразуем строку в массив.
$originalArr = [];
for ($i = 0; $i < mb_strlen($string); $i++) {
    $originalArr[] = mb_substr($string, $i, 1);
}

// Возвращает массив с элементами в обратном порядке.
$reversedArr = array_reverse($originalArr);

// Если оригинальный массив и реверсивный массив совпадаеют, то строка - палиндром, иначе - не палиндром.
echo ($originalArr == $reversedArr) ? "{$stringOriginal} - это Палиндром" : "{$stringOriginal} - это не Палиндром";
