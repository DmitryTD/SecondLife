<?php

if (isset($_POST['download'])) {
    // Пути к файлам, которые вы хотите скачать
    $file1 = './share/beauty.pdf';

    // Имена файлов, как они будут отображаться у пользователя
    $filename1 = 'beauty.pdf';

    // Отправляем заголовки для скачивания файлов
    header('Content-Type: application/pdf'); // Меняйте тип содержимого на соответствующий файлу
    header('Content-Disposition: attachment; filename="' . $filename1 . '"');
    readfile($file1);
    exit;
}

?>
