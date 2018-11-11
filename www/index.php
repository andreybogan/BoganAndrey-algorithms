<?php
function quickSort($arr)
{
    static $step = 0;
    static $simple = 0;

    $count = count($arr);
    if ($count <= 1) {
        $simple++;
        return $arr;

    }

    $simple++;
    $first_val = $arr[0];
    $simple++;
    $left_arr = [];
    $simple++;
    $right_arr = [];

    for ($i = 1; $i < $count; $i++) {
        $step++;
        if ($arr[$i] <= $first_val) {
            $left_arr[] = $arr[$i];
        } else {
            $right_arr[] = $arr[$i];
        }
    }

    $simple++;
    $left_arr = quickSort($left_arr);

    $simple++;
    $right_arr = quickSort($right_arr);

    $simple++;
    $result = array_merge($left_arr, array($first_val), $right_arr);

    // Вычисление сложности алгоритма для каждого вызова функции.
    // В последнем вызове покажется общая сложность алгоритма.
    if ($step > $simple) {
        echo "Количесвто шагов: " . ($step + $simple) . "<br>";
        echo "Сложность элемента: О({$step})<br>";
    } else {
        echo "Количесвто шагов: " . ($step + $simple) . "<br>";
        echo "Сложность элемента: О(" . ($step + $simple) . ")<br>";
    }

    return $result;
}

var_dump(quickSort([2, 3, 1, 7, 4, 0, 6, 5, 8, 9, 10, 11, 12]));
