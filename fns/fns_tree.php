<?php
/**
 * Функция выполняет рекурсивный обход и выводит имена подкатологов и файлов в текущем каталоге.
 * @param string $path Путь к каталогу.
 */
function printTree($path)
{
    echo "<ul>";
    $dir = new DirectoryIterator($path);
    foreach ($dir as $file) {
        // Получаем имя файла или каталога.
        $fileName = $file->getFilename();
        // Если это директория.
        if ($file->isDir()) {
            // Если имя не равно: .git и .idea
            if (!$file->isDot() && $fileName != '.git' && $fileName != '.idea') {
                echo "<li><a href='/?path=" . $file->getPathname() . "' style='font-weight: bold; text-decoration: underline;'> " . $fileName . "</a>";
//                printTree($path . "/" . $fileName);
                echo "</li>";
                continue;
            } elseif ($file->isDot()){
                echo "<li><a href='/?path=" . $file->getPathname() . "' style='font-weight: bold; text-decoration: underline;'> " . $fileName . "</a></li>";
            }
        } else {
            // Если элемент не является каталогом, просто выводим его.
            echo "<li>" . $fileName . "</li>";
        }
    }
    echo "</ul>";
}