<?php
session_start();
session_destroy();
header('Location: registration.php'); // Перенаправление на страницу входа после выхода
exit();
?>