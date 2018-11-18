<?php
$connect = mysqli_connect("localhost", "root", "", "algoritm-3");
$result = mysqli_query($connect,
    "SELECT DISTINCT id_category id, category_name name, parent_id, child_id, level from categories c inner join category_links cl on c.id_category = cl.child_id");

if (mysqli_num_rows($result) > 0) {
    $cats = [];
    while ($cat = mysqli_fetch_assoc($result)) {
        if (($cat['parent_id'] != $cat['child_id'] || $cat['level'] == 0) && $cat['parent_id'] >= $cat['level']) {
            $cats[$cat['level']][] = [
                'id' => $cat['id'],
                'name' => $cat['name'],
                'parent_id' => $cat['parent_id'],
                'child_id' => $cat['child_id'],
//                'level' => $cat['level'],
            ];
        }
    }
    var_dump($cats);
}

/* Функция строит наше иерархическое дерево любой вложенности.
   В качестве параметров функции передаем массив разделов и id раздела
   В цикле перебираем подкатегории и если в них есть разделы то запускаем функцию
   еще раз с параметрами (новый массив разделов, id раздела, который нужно построить)
*/
function build_tree($cats, $parent_id, $only_parent = false)
{var_dump($only_parent);
    if (is_array($cats) and isset($cats[$parent_id])) {
        $tree = "<ul>";
        if ($only_parent == false) {
            foreach ($cats[$parent_id] as $cat) {
                var_dump($cat);
                $tree .= "<li>" . $cat['name'];
                $tree .= build_tree($cats, $cat['id']);
                $tree .= "</li>";
            }

        } elseif (is_numeric($only_parent)) {
            $cat = $cats[$parent_id][$only_parent];
            $tree .= "<li>" . $cat['name'];
            $tree .= build_tree($cats, $cat['id']);
            $tree .= "</li>";
        }
        $tree .= "</ul>";
    } else {
        return null;
    }
    return $tree;
}

echo build_tree($cats, 0);
